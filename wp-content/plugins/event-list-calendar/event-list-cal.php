<?php

/*
Plugin Name: Event List Calendar
Plugin URI: http://ryanfait.com/resources/wordpress-event-list-calendar-plugin/
Description: This plugin adds an Events section to the WordPress admin which allows you to post events and display them in an ajax powered calendar or a simple list of upcoming events.
Author: Ryan Fait
Version: 1.7
Author URI: http://ryanfait.com/
Text Domain: event-list-calendar
*/





add_filter('widget_text', 'do_shortcode'); // Allows the shortcode to work in text widgets.





function event_list_cal_post_type() {
	register_post_type( 'event-list-cal',
		array(
			'labels' => array(
				'name' => 'Events',
				'singular_name' => 'Event',
				'edit_item' => 'Edit Event',
				'add_new_item' => 'Add New Event'
			),
		'taxonomies' => array('category'),
		'menu_icon' => 'dashicons-calendar',
		'menu_position' => 23,
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'event'),
		'supports' => array( 'title', 'editor' ),
		)
	);
}
add_action( 'init', 'event_list_cal_post_type' );





function event_list_cal_columns( $cols ) {

	$cols = array(
		'cb'			=>	'<input type="checkbox" />',
		'title'			=>	_x('Event Title', 'event-list-calendar'),
		'event-date'	=>	__('Event Date', 'event-list-calendar'),
		'event-repeat'	=>	__('Event Repetition', 'event-list-calendar'),
		'event-days'	=>	__('Event Length', 'event-list-calendar'),
		'categories'	=>	__('Categories', 'event-list-calendar'),
	);
	return $cols;
}
add_filter( 'manage_event-list-cal_posts_columns', 'event_list_cal_columns' );





function event_list_cal_columns_data( $column, $post_id ) {
  switch ( $column ) {
	case "event-date":
	  $event_date = get_post_meta( $post_id, 'event-date', true);
	  echo $event_date;
	  break;
	case "event-repeat":
		$event_repeat = get_post_meta( $post_id, 'event-repeat', true);
		if($event_repeat == 1) {
			$event_repeat = __('Weekly', 'event-list-calendar');
		} elseif($event_repeat == 2) {
			$event_repeat = __('Monthly', 'event-list-calendar');
		} elseif($event_repeat == 3) {
			$event_repeat = __('Yearly', 'event-list-calendar');
		} else {
			$event_repeat = __('One Time Event', 'event-list-calendar');
		}
		echo $event_repeat;
		break;
	case "event-days":
		$event_days = get_post_meta( $post_id, 'event-days', true);
		if(empty($event_days)) {
			$event_days = $event_days.__('1 Day', 'event-list-calendar');
		} elseif($event_days == 1) {
			$event_days = $event_days.__(' Day', 'event-list-calendar');
		} else {
			$event_days = $event_days.__(' Days', 'event-list-calendar');
		}
		echo $event_days;
		break;
  }
}
add_action( 'manage_posts_custom_column', 'event_list_cal_columns_data', 10, 2 ); 





function event_list_cal_sortable_columns( $columns ) {
	$cols['event-date'] = 'event-date';
	$cols['event-repeat'] = 'event-repeat';
	$cols['event-days'] = 'event-days';
	return $cols;
}
add_filter( 'manage_edit-event-list-cal_sortable_columns', 'event_list_cal_sortable_columns' );





function event_list_cal( $atts ) {

	extract( shortcode_atts( array(
		'month' => current_time('m', 0),
		'year' => current_time('Y', 0),
	), $atts, 'upcoming-events' ) );

	$cal_output = "";
	$current_month = 1;

	if(empty( $atts['month']) || empty( $atts['year'] ) ) {
		$atts['month'] = current_time('m', 0);
		$atts['year'] = current_time('Y', 0);
		$current_month = 0;
	}

	if($year == current_time('Y', 0) && $month == current_time('m', 0)) {
		$current_month = 1;
	} else {
		$current_month = 0;
	}	

	$month = $atts['month'];
	$year = $atts['year'];

	$calendar_month = strtotime($year."-".$month."-01");

	if(isset($_GET['month'])) {
		$calendar_month = strtotime($_GET['month']."-01");
		$date = split('-', $_GET['month']);
		$year = $date[0];
		$month = $date[1];
		if($year == current_time('Y', 0) && $month == current_time('m', 0)) {
			$current_month = 1;
		} else {
			$current_month = 0;
		}
	}
	

	$events = array();

	$args = array(
				'post_type'			=> 'event-list-cal',
				'posts_per_page'	=> -1,
			);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		$event_date = get_post_custom_values('event-date');
		$event_date = strtotime($event_date[0]);
		$event_time = get_post_custom_values('event-time');
		$event_time = $event_time[0];
		$event_days = get_post_custom_values('event-days');
		$event_days = $event_days[0];
		$event_repeat = get_post_custom_values('event-repeat');
		$event_repeat = $event_repeat[0];
		$event_end = get_post_custom_values('event-end');
		$event_end = $event_end[0];
		if($event_repeat > 0) {
			$event_repeat_schedule = $event_repeat;
		} else {
			$event_repeat_schedule = 0;
		}
		$events[] = "<a href=\"".get_permalink($loop->ID)."\">".get_the_title()."</a>==".$event_date."==".$event_time."==<a href=\"".get_permalink($loop->ID)."\">&nbsp;</a>".get_the_excerpt()."==".$event_days."==".$event_repeat_schedule."==".$event_end;
	endwhile;

	$num_days = date('t', mktime(0, 0, 0, $month, 1, $year));
	$strt_day = date('w', mktime(0, 0, 0, $month, 1, $year));

	/* Handle multiple day events from previous months */

	foreach($events as $event) {
		$event_array = split('==', $event);
		$event_link = $event_array[0];
		$event_date = intval($event_array[1]);
		$event_time = $event_array[2];
		$event_excerpt = $event_array[3];
		$event_days = $event_array[4];
		$event_repeat_schedule = $event_array[5];
		$event_end = $event_array[6];
		
		if($event_end == 0) {
			$event_end = '2038-01-19';
		}

		$event_year = date('Y', $event_date);
		$event_month = date('m', $event_date);
		$event_day = date('d', $event_date);
	
		if($month == 1) {
			if($event_year == ($year - 1) && $event_month == 12 && !empty($event_days)) {
				$num_days_prev_month = date('t', mktime(0, 0, 0, $month, 1, ($year - 1)));

				if($event_days > ($num_days_prev_month - $event_day)) {

					$days_to_go = abs($num_days_prev_month - $event_day - $event_days + 1);
					for($i = 1; $i <= $days_to_go; $i++) {
						$new_date = ($year."-".$month."-".$i);
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==0";
					}
				}
			}
		} else {
			if($event_year == $year && $event_month == ($month - 1) && !empty($event_days)) {
				$num_days_prev_month = date('t', mktime(0, 0, 0, ($month - 1), 1, $year));
				
				if($event_days > ($num_days_prev_month - $event_day)) {

					$days_to_go = abs($num_days_prev_month - $event_day - $event_days + 1);
					for($i = 1; $i <= $days_to_go; $i++) {
						$new_date = ($year."-".$month."-".$i);
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==0";
					}
				}
			}
		}

		/* Handle recurring events - All posibilities need to be addressed due to the ability to start a calendar on a specific month */

		if($event_repeat_schedule == 1) {
			/* check to make sure date starts in the current month or if it is after $event_date */
			if($event_year == $year && $event_month == $month) {
				$add_seven = $event_day;
				for($i = 0; $i < 5; $i++) {
					$add_seven = $add_seven + 7;
					$new_date = $year."-".$month."-".$add_seven;
					if(strtotime($new_date) <= strtotime($event_end)) {
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==".$event_end;
					}
				}
			} elseif(strtotime($year."-".$month."-01") > $event_date) {
				/* get day of week it is on */
				$day_of_week = date('w', $event_date) + 1;
				$add_seven = $day_of_week - $strt_day;
				for($i = 0; $i < 5; $i++) {
					$new_date = $year."-".$month."-".$add_seven;
					if(strtotime($new_date) <= strtotime($event_end)) {
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==".$event_end;
					}
					$add_seven = $add_seven + 7;
				}
			}
		} elseif($event_repeat_schedule == 2) {
			if(strtotime($year."-".$month."-01") > $event_date && strtotime($year."-".$month."-".date('d', $event_date)) <= strtotime($event_end)) {
				$events[] = $event_link."==".strtotime($year."-".$month."-".$event_day)."==".$event_time."==".$event_excerpt."==0==0";
			}
		} elseif($event_repeat_schedule == 3) {
			if(strtotime($year."-".$month."-01") > $event_date && $month == $event_month && strtotime($year."-".$month."-".date('d', $event_date)) <= strtotime($event_end)) {
				$events[] = $event_link."==".strtotime($year."-".$month."-".$event_day)."==".$event_time."==".$event_excerpt."==0==0";
			}
		}
	}

	/* Draw calendar */

	$cal_output .= "
<div id=\"event-list-cal-container\">
	<h2 id=\"event-list-cal-month\">".date('F Y', $calendar_month)."</h2>
	<p class=\"event-list-cal-pager\"><span id=\"event-list-cal-prev\"><a href=\"?month=".date('Y-m', strtotime('-1 month', $calendar_month))."\">&laquo; ".date('F', strtotime('-1 month', $calendar_month))."</a></span><span id=\"event-list-cal-next\"><a href=\"?month=".date('Y-m', strtotime('+1 month', $calendar_month))."\">".date('F', strtotime('+1 month', $calendar_month))." &raquo;</a></span></p>
	<div id=\"event-list-cal\">
		<table class=\"event-list-cal\" id=\"".$month."-".$year."-full-".get_bloginfo('language')."\">
			<thead>
				<tr>";
	if(get_settings('start_of_week') != 1) {
		$cal_output .= "
					<th>".__( 'Sunday', 'event-list-calendar' )."</th>";
	}
	$cal_output .= "
					<th>".__( 'Monday', 'event-list-calendar' )."</th>
					<th>".__( 'Tuesday', 'event-list-calendar' )."</th>
					<th>".__( 'Wednesday', 'event-list-calendar' )."</th>
					<th>".__( 'Thursday', 'event-list-calendar' )."</th>
					<th>".__( 'Friday', 'event-list-calendar' )."</th>
					<th>".__( 'Saturday', 'event-list-calendar' )."</th>";
	if(get_settings('start_of_week') == 1) {
		$cal_output .= "
					<th>".__( 'Sunday', 'event-list-calendar' )."</th>";
	}
	$cal_output .= "
				</tr>
			</thead>
			<tbody>
				<tr>";
	$k = 0;
	if(get_settings('start_of_week') != 1) {
		for($i = 0; $i < $strt_day; $i++) {
			$cal_output .= "
						<td class=\"event-list-cal-blank\">&nbsp;</td>\r";
			$k++;
		}
	} else {
		for($i = 1; $i < $strt_day; $i++) {
			$cal_output .= "
						<td class=\"event-list-cal-blank\">&nbsp;</td>\r";
			$k++;
		}
	}
	$x = $k + 1;
	for($j = 1; $j <= $num_days; $j++) {

		if($x == 6 || $x == 7 || $x == 13 || $x == 14 || $x == 20 || $x == 21 || $x == 27 || $x == 28 || $x == 34 || $x == 35) {
			$class = ' class="event-list-cal-right"';
		}
		if($j == current_time('j', 0) && $current_month == 1) {
			if($x == 6 || $x == 7 || $x == 13 || $x == 14 || $x == 20 || $x == 21 || $x == 27 || $x == 28 || $x == 34 || $x == 35) {
				$class = ' class="today event-list-cal-right"';
			} else {
				$class = ' class="today"';
			}
		}

		$cal_output .= "
					<td".$class.">
						<div class=\"event-list-cal-day\">".$j."</div>";

		foreach($events as $event) {

			$event_array = split('==', $event);
			$event_link = $event_array[0];
			$event_date = $event_array[1];
			$event_time = $event_array[2];
			$event_excerpt = $event_array[3];
			$event_days = $event_array[4];
			$event_repeat = $event_array[5];

			$event_year = date('Y', intval($event_date));
			$event_month = date('m', intval($event_date));
			$event_day = date('d', intval($event_date));
			
			if($event_year == $year && $event_month == $month && $event_day == $j) {
				$cal_output .= "
						<div class=\"event-list-cal-single\">
							<p>".$event_link."</p>
							<div class=\"event-list-cal-excerpt\">";
				if(!empty($event_time)) {
					$cal_output .= "
								<p class=\"event-list-cal-time\">Event Time: ".$event_time."</p>";
				}
				$cal_output .= "
								".$event_excerpt."
							</div>
						</div>\r";
				
				/* If multiple days, add to $events[] */
				
				if(!empty($event_days)) {
					$new_event_date = $event_date + 86400;
					while($event_days > 1) {
						$event_days = $event_days - 1;
						$events[] = $event_link."==".$new_event_date."==".$event_time."==".$event_excerpt."==0==".$event_repeat;
						$new_event_date = $new_event_date + 86400;
					}
				}
			}
		}

		$cal_output .= "
					</td>";
		$class = "";
		$k++;
		if($k % 7 == 0) {
			$cal_output .= "
				</tr>
				<tr>";
		}
		$x++;
	}
	if($x > 36) {
		while($x <= 42 ) {
			$cal_output .= "
					<td class=\"event-list-cal-blank\"></td>";
			$x++;
		}
	} elseif($x > 29 && $x != 36) {
		while($x <= 35) {
			$cal_output .= "
					<td class=\"event-list-cal-blank\"></td>";
			$x++;
		}
	}
	$cal_output .= "
				</tr>
			</tbody>
		</table>
	</div>
</div>";
	
	$cal_output .= $not_current_month;

	wp_reset_query();

	return $cal_output;
}
add_shortcode('calendar', 'event_list_cal');




function event_list_mini_cal() {

	$cal_output = "";

	$month = current_time('m', 0);
	$year = current_time('Y', 0);

	$calendar_month = strtotime($year."-".$month."-01");
	$current_month = 1;

	if(isset($_GET['month'])) {
		$calendar_month = strtotime($_GET['month']."-01");
		$date = split('-', $_GET['month']);
		$year = $date[0];
		$month = $date[1];
		if($year != current_time('Y', 0) || $month != current_time('m', 0)) {
			$current_month = 0;
		}
	}
	

	$events = array();

	$args = array(
				'post_type'			=> 'event-list-cal',
				'posts_per_page'	=> -1,
			);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		$event_date = get_post_custom_values('event-date');
		$event_date = strtotime($event_date[0]);
		$event_time = get_post_custom_values('event-time');
		$event_time = $event_time[0];
		$event_days = get_post_custom_values('event-days');
		$event_days = $event_days[0];
		$event_repeat = get_post_custom_values('event-repeat');
		$event_repeat = $event_repeat[0];
		$event_end = get_post_custom_values('event-end');
		$event_end = $event_end[0];
		if($event_repeat > 0) {
			$event_repeat_schedule = $event_repeat;
		} else {
			$event_repeat_schedule = 0;
		}
		$events[] = "<a href=\"".get_permalink($loop->ID)."\">".get_the_title()."</a>==".$event_date."==".$event_time."==<a href=\"".get_permalink($loop->ID)."\">&nbsp;</a>".get_the_excerpt()."==".$event_days."==".$event_repeat_schedule."==".$event_end;
	endwhile;

	$num_days = date('t', mktime(0, 0, 0, $month, 1, $year));
	$strt_day = date('w', mktime(0, 0, 0, $month, 1, $year));

	/* Handle multiple day events from previous months */

	foreach($events as $event) {
		$event_array = split('==', $event);
		$event_link = $event_array[0];
		$event_date = intval($event_array[1]);
		$event_time = $event_array[2];
		$event_excerpt = $event_array[3];
		$event_days = $event_array[4];
		$event_repeat_schedule = $event_array[5];
		$event_end = $event_array[6];
		
		if($event_end == 0) {
			$event_end = '2038-01-19';
		}

		$event_year = date('Y', $event_date);
		$event_month = date('m', $event_date);
		$event_day = date('d', $event_date);
	
		if($month == 1) {
			if($event_year == ($year - 1) && $event_month == 12 && !empty($event_days)) {
				$num_days_prev_month = date('t', mktime(0, 0, 0, $month, 1, ($year - 1)));

				if($event_days > ($num_days_prev_month - $event_day)) {

					$days_to_go = abs($num_days_prev_month - $event_day - $event_days + 1);
					for($i = 1; $i <= $days_to_go; $i++) {
						$new_date = ($year."-".$month."-".$i);
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==0";
					}
				}
			}
		} else {
			if($event_year == $year && $event_month == ($month - 1) && !empty($event_days)) {
				$num_days_prev_month = date('t', mktime(0, 0, 0, ($month - 1), 1, $year));
				
				if($event_days > ($num_days_prev_month - $event_day)) {

					$days_to_go = abs($num_days_prev_month - $event_day - $event_days + 1);
					for($i = 1; $i <= $days_to_go; $i++) {
						$new_date = ($year."-".$month."-".$i);
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==0";
					}
				}
			}
		}

		/* Handle recurring events - All posibilities need to be addressed due to the ability to start a calendar on a specific month */

		if($event_repeat_schedule == 1) {
			/* check to make sure date starts in the current month or if it is after $event_date */
			if($event_year == $year && $event_month == $month) {
				$add_seven = $event_day;
				for($i = 0; $i < 5; $i++) {
					$add_seven = $add_seven + 7;
					$new_date = $year."-".$month."-".$add_seven;
					if(strtotime($new_date) <= strtotime($event_end)) {
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==".$event_end;
					}
				}
			} elseif(strtotime($year."-".$month."-01") > $event_date) {
				/* get day of week it is on */
				$day_of_week = date('w', $event_date) + 1;
				$add_seven = $day_of_week - $strt_day;
				for($i = 0; $i < 5; $i++) {
					$new_date = $year."-".$month."-".$add_seven;
					if(strtotime($new_date) <= strtotime($event_end)) {
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==".$event_end;
					}
					$add_seven = $add_seven + 7;
				}
			}
		} elseif($event_repeat_schedule == 2) {
			if(strtotime($year."-".$month."-01") > $event_date && strtotime($year."-".$month."-".date('d', $event_date)) <= strtotime($event_end)) {
				$events[] = $event_link."==".strtotime($year."-".$month."-".$event_day)."==".$event_time."==".$event_excerpt."==0==0";
			}
		} elseif($event_repeat_schedule == 3) {
			if(strtotime($year."-".$month."-01") > $event_date && $month == $event_month && strtotime($year."-".$month."-".date('d', $event_date)) <= strtotime($event_end)) {
				$events[] = $event_link."==".strtotime($year."-".$month."-".$event_day)."==".$event_time."==".$event_excerpt."==0==0";
			}
		}
	}

	/* Draw calendar */

	$cal_output .= "
<div id=\"event-list-mini-cal-container\">
	<h2 id=\"event-list-mini-cal-month\"><span id=\"event-list-mini-cal-prev\"><a href=\"?month=".date('Y-m', strtotime('-1 month', $calendar_month))."\">&laquo;</a> </span><span id=\"event-list-mini-cal-date\">".date('F Y', $calendar_month)."</span> <span id=\"event-list-mini-cal-next\"><a href=\"?month=".date('Y-m', strtotime('+1 month', $calendar_month))."\">&raquo;</a></span></h2>
	<div id=\"event-list-mini-cal\">
		<table class=\"event-list-cal event-list-mini-cal\" id=\"".$month."-".$year."-mini-".get_bloginfo('language')."\">
			<thead>
				<tr>";
	if(get_settings('start_of_week') != 1) {
		$cal_output .= "
					<th>".__( 'Sun', 'event-list-calendar' )."</th>";
	}
	$cal_output .= "
					<th>".__( 'Mon', 'event-list-calendar' )."</th>
					<th>".__( 'Tue', 'event-list-calendar' )."</th>
					<th>".__( 'Wed', 'event-list-calendar' )."</th>
					<th>".__( 'Thu', 'event-list-calendar' )."</th>
					<th>".__( 'Fri', 'event-list-calendar' )."</th>
					<th>".__( 'Sat', 'event-list-calendar' )."</th>";                                                                     
					
	if(get_settings('start_of_week') == 1) {
		$cal_output .= "
					<th>".__( 'Sun', 'event-list-calendar' )."</th>";
	}
	$cal_output .= "
				</tr>
			</thead>
			<tbody>
				<tr>";
	$k = 0;
	if(get_settings('start_of_week') != 1) {
		for($i = 0; $i < $strt_day; $i++) {
			$cal_output .= "
						<td class=\"event-list-cal-blank\">&nbsp;</td>\r";
			$k++;
		}
	} else {
		for($i = 1; $i < $strt_day; $i++) {
			$cal_output .= "
						<td class=\"event-list-cal-blank\">&nbsp;</td>\r";
			$k++;
		}
	}
	$x = $k + 1;
	for($j = 1; $j <= $num_days; $j++) {

		if($x == 5 || $x == 6 || $x == 7 || $x == 12 || $x == 13 || $x == 14 || $x == 19 || $x == 20 || $x == 21 || $x == 26 || $x == 27 || $x == 28 || $x == 33 || $x == 34 || $x == 35) {
			$class = ' class="event-list-cal-right"';
		}
		if($j == current_time('j', 0) && $current_month == 1) {
			if($x == 5 || $x == 6 || $x == 7 || $x == 12 || $x == 13 || $x == 14 || $x == 19 || $x == 20 || $x == 21 || $x == 26 || $x == 27 || $x == 28 || $x == 33 || $x == 34 || $x == 35) {
				$class = ' class="today event-list-cal-right"';
			} else {
				$class = ' class="today"';
			}
		}

		$cal_output .= "
					<td".$class.">
						";

		$day_events = array();

		foreach($events as $event) {

			$event_array = split('==', $event);
			$event_link = $event_array[0];
			$event_date = $event_array[1];
			$event_time = $event_array[2];
			$event_excerpt = $event_array[3];
			$event_days = $event_array[4];
			$event_repeat = $event_array[5];

			$event_year = date('Y', intval($event_date));
			$event_month = date('m', intval($event_date));
			$event_day = date('d', intval($event_date));

			if($event_year == $year && $event_month == $month && $event_day == $j) {
				$day_events[$j][] = $event_link;
				
				/* If multiple days, add to $events[] */
				
				if(!empty($event_days)) {
					$new_event_date = $event_date + 86400;
					while($event_days > 1) {
						$event_days = $event_days - 1;
						$events[] = $event_link."==".$new_event_date."==".$event_time."==".$event_excerpt."==0==".$event_repeat;
						$new_event_date = $new_event_date + 86400;
					}
				}
			}
		}

		if(!empty($day_events[$j])) {
			$cal_output .= '<span class="event-list-mini-cal-event"><div class="event-list-mini-cal-day">'.$j.'</div></div></b>';
			$cal_output .= '<div class="event-list-mini-cal-hover">';
			foreach($day_events[$j] as $event) {
				$cal_output .= '<div class="event-list-mini-cal-event-single-link">'.$event.'</div>';
			}
			$cal_output .= '</div>';
		} else {
			$cal_output .= '<div class="event-list-mini-cal-day">'.$j.'</div>';
		}

		$cal_output .= "
					</td>";
		$class = "";
		$k++;
		if($k % 7 == 0) {
			$cal_output .= "
				</tr>
				<tr>";
		}
		$x++;
	}
	if($x > 36) {
		while($x <= 42 ) {
			$cal_output .= "
					<td class=\"event-list-cal-blank\"></td>";
			$x++;
		}
	} elseif($x > 29 && $x != 36) {
		while($x <= 35) {
			$cal_output .= "
					<td class=\"event-list-cal-blank\"></td>";
			$x++;
		}
	}
	$cal_output .= "
				</tr>
			</tbody>
		</table>
	</div>
</div>";

	wp_reset_query();

	return $cal_output;
}
add_shortcode('mini-calendar', 'event_list_mini_cal');





function event_list_cal_list( $atts ) {

	extract( shortcode_atts( array(
		'num_events' => 5,
		'categories' => '',
	), $atts, 'upcoming-events' ) );

	if(empty($atts['num_events'])) {
		$atts['num_events'] = 5;
	}

	$i = 1;

	$events = array();

	/* Get all upcoming events and exclude recurring events. We'll grab recurring events next. */

	$d = current_time("Y-m-d", 0);
	$args = array(
		'post_type'			=>	'event-list-cal',
		'posts_per_page'	=>	$atts['num_events'],
		'category_name'		=>	$atts['categories'],
		'meta_key'			=>	'event-date',
		'orderby'			=>	'meta_value',
		'order'				=>	'ASC',
		'meta_query'		=>	array(
									array(
										'key' => 'event-date',
										'value' => $d,
										'type' => 'date',
										'compare' => '>='
									)
								)
	);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		$event_date = get_post_custom_values('event-date');
		$event_date = strtotime($event_date[0]);
		$event_repeat = get_post_custom_values('event-repeat');
		$event_repeat = $event_repeat[0];
		$event_end = get_post_custom_values('event-end');
		$event_end = $event_end[0];
		if($event_repeat == 0) {
			if(!array_key_exists($event_date, $events)) {
				$events[$event_date] = "<a href=\"".get_permalink($loop->ID)."\">".get_the_title()."</a>";
			} else {
				if($events[$event_date] != "<a href=\"".get_permalink($loop->ID)."\">".get_the_title()."</a>") {
					$events[$event_date + $i] = "<a href=\"".get_permalink($loop->ID)."\">".get_the_title()."</a>";
					$i++;
				}
			}
		}
	endwhile;

	$j = 1;

	$recurring_events = array();

	/* Let's grab all the recurring events, check to see if their end date is after $d, and add them to $events */

	$args = array(
		'post_type'			=>	'event-list-cal',
		'category_name'		=>	$atts['categories'],
		'meta_key'			=>	'event-date',
		'meta_query'		=>	array(
									array(
										'key' => 'event-repeat',
										'value' => array( 1, 2, 3 ),
										'compare' => 'IN'
									)
								)
	);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		$event_date = get_post_custom_values('event-date');
		$event_date = strtotime($event_date[0]);
		$event_repeat = get_post_custom_values('event-repeat');
		$event_repeat_schedule = $event_repeat[0];
		$event_end = get_post_custom_values('event-end');
		$event_end = $event_end[0];
		if(!array_key_exists($event_date, $recurring_events)) {
			$recurring_events[$event_date] = "<a href=\"".get_permalink($loop->ID)."\">".get_the_title()."</a>==".$event_repeat_schedule."==".$event_end;
		} else {
			$recurring_events[$event_date + $i] = "<a href=\"".get_permalink($loop->ID)."\">".get_the_title()."</a>==".$event_repeat_schedule."==".$event_end;
			$i++;
		}
		$repeats = 1;
	endwhile;
	
	$list_output .= "
<ul class=\"event-list-cal-list\">
";

	$k = 1;
	$l = 1;

	foreach($recurring_events as $date => $data) {
		$split = split('==', $data);
		$event_link = $split[0];
		$event_repeat_schedule = $split[1];
		$event_end = $split[2];
		if($event_end == 0) {
			$event_end = strtotime('2038-01-19');
		} else {
			$event_end = strtotime($event_end);
		}
		if($event_end >= strtotime($d)) {
			if($event_repeat_schedule == 1) {
				$new_date = strtotime(date('Y-m-d', $date));
				while($k <= $atts['num_events']) {
					if($new_date <= $event_end && $new_date >= strtotime($d)) {
						if(!array_key_exists($new_date, $events)) {
							$events[$new_date] = $event_link;
							$k++;
						} else {
							$events[$new_date + $i] = $event_link;
							$i++;
							$k++;
						}
					}
					$new_date = strtotime('+1 week', $new_date);
				}
			} elseif($event_repeat_schedule == 2) {
				$new_date = strtotime(date('Y-m-d', $date));
				while($l <= $atts['num_events']) {
					if($new_date <= $event_end && $new_date >= strtotime($d)) {
						if(!array_key_exists($new_date, $events)) {
							$events[$new_date] = $event_link;
							$l++;
						} else {
							$events[$new_date + $i] = $event_link;
							$i++;
							$l++;
						}
					}
					$new_date = strtotime('+1 month', $new_date);
				}
			} elseif($event_repeat_schedule == 3) {
				$new_date = strtotime(date('Y-m-d', $date));
				for($x = 0; $x <= 24; $x++) {
					if($new_date <= $event_end && $new_date >= strtotime($d)) {
						if(!array_key_exists($new_date, $events)) {
							$events[$new_date] = $event_link;
						} else {
							$events[$new_date + $i] = $event_link;
							$i++;
						}
					}
					$new_date = strtotime('+1 year', $new_date);
				}
			}
		}
	}

	ksort($events);
	$events = array_slice($events, 0, $atts['num_events'], true);
	
	foreach($events as $date => $event_link) {
		$list_output .= "\t<li class=\"upcoming-event-".$j."\"><span class=\"event-list-cal-date\">".date(get_option('event_list_cal_upcoming_date_format', 'Y • m • d'), $date)."</span><span class=\"event-list-cal-title\">".$event_link."</span></li>
";
		$j++;
	}
	if(empty($events)) {
		$list_output .= "\t<li class=\"upcoming-event-no-events\">".__('There are no upcoming events.', 'event-list-calendar')."</li>
";
	}

	$list_output .= "</ul>
";

	wp_reset_query();

	return $list_output;
}

add_shortcode('upcoming-events', 'event_list_cal_list');





function event_list_cal_above_content($content) {
	if ( is_singular( 'event-list-cal' ) ) {
		$post_custom = get_post_custom();
		$date_format = get_option( 'event_list_cal_single_date_format', get_option( 'date_format' ) );
		foreach($post_custom as $key => $value) {
			if($key == 'event-date') {
				$date = strtotime($value[0]);
				$event_date = date($date_format, $date);
			}
			if($key == 'event-days' && $value[0] > 1) {
				$end_date = date($date_format, strtotime('+ '.$value[0].' days', $date));
			}
			if($key == 'event-time' && !empty($value[0])) {
				$event_time = $value[0];
			}
			if($key == 'event-repeat' && $value[0] > 0) {
				switch($value[0]) {
					case 1:
						$event_repeat = 'weekly';
						break;
					case 2:
						$event_repeat = 'monthly';
						break;
					case 3:
						$event_repeat = 'yearly';
						break;
				}
			}
			if($key == 'event-end' && $value[0] != 0) {
				$event_end .= date($date_format, strtotime($value[0]));
			}
		}
		$event_data .= '<div class="event-list-cal-info"><div class="event-list-cal-singular-date"><b>'.__('Event Date: ', 'event-list-calendar').$event_date;
		if(isset($end_date)) {
			$event_data .= __(' to ', 'event-list-calendar').$end_date.'</b></div>';
		} else {
			$event_data .= '</b></div>';
		}
		if(isset($event_time)) {
			$event_data .= '<div class="event-list-cal-singular-time"><b>'.__('Event Time: ', 'event-list-calendar').$event_time.'</b></div>';
		}
		if(isset($event_repeat)) {
			$event_data .= '<div class="event-list-cal-singular-repeat"><b>'.__('This event repeats ', 'event-list-calendar').$event_repeat;
			if(isset($event_end)) {
				$event_data .= __(' until ', 'event-list-calendar').$event_end.'.</b></div>';
			} else {
				$event_data .= '.</b></div>';
			}
		}
		$event_data .= '</div>';
		$content = $event_data.$content;
	}
	return $content;
}
add_filter( 'the_content', 'event_list_cal_above_content' );





function event_list_cal_metabox() {
	add_meta_box(
		'event-list-cal-metabox',
		__( 'Event Date &amp; Time', 'event-list-calendar' ),
		'event_list_cal_add_metabox',
		'event-list-cal',
		'normal',
		'core'
	);
	add_meta_box(
		'event-list-cal-metabox-repeat',
		__( 'Optional: Make This a Multiple Day Event, or a Weekly, Monthly, or Yearly Event', 'event-list-calendar' ),
		'event_list_cal_add_metabox1',
		'event-list-cal',
		'normal',
		'core'
	);
}
add_action( 'add_meta_boxes', 'event_list_cal_metabox' );





function event_list_cal_add_metabox( $post ) {

	wp_nonce_field( basename( __FILE__ ), 'event-list-cal-nonce' );

	$event_date = get_post_meta( $post->ID, 'event-date', true );
	$event_time = get_post_meta( $post->ID, 'event-time', true );

	if(empty($event_date)) {
		$event_date = date('Y-m-d', time());
	}

?>
	<div>
		<label for="event-list-cal-event-date" style="width: 100px; display: inline-block;"><?php _e( 'Event Date *', 'event-list-calendar' ); ?></label>
		<input id="event-list-cal-event-date" type="text" name="event-list-cal-event-date" placeholder="YYYY-MM-DD" value="<?php echo $event_date; ?>">
	</div>
	<div style="padding-top: 1em;">
		<label for="event-list-cal-event-time" style="width: 100px; display: inline-block;"><?php _e( 'Event Time', 'event-list-calendar' ); ?></label>
		<input id="event-list-cal-event-time" type="text" name="event-list-cal-event-time" placeholder="<?php _e( '1pm to 3:30pm, All Day...', 'event-list-calendar' ); ?>" value="<?php echo $event_time; ?>">
	</div>
<?php
}





function event_list_cal_add_metabox1( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'event-list-cal-nonce' );

	$event_days = get_post_meta( $post->ID, 'event-days', true );
	$event_repeat = get_post_meta( $post->ID, 'event-repeat', true );
	$event_end = get_post_meta( $post->ID, 'event-end', true );
	
	$weekly = '';
	$monthly = '';
	$yearly = ' selected="selected"';
	
	if(empty($event_days)) {
		$event_days = 1;
	}

	if($event_repeat > 0) {
		$checked = ' checked="checked"';
		$event_schedule = $event_repeat;
		if($event_schedule == 1) {
			$weekly = ' selected="selected"';
			$yearly = '';
		} elseif($event_schedule == 2) {
			$monthly = ' selected="selected"';
			$yearly = '';
		}
	} else {
		$checked = '';
	}

	if(!$event_end) {
		$checked_2 = ' checked="checked"';
		$event_end = '';
		$end_display = ' display: none;';
	} else {
		$checked_2 = '';
	}
?>
	<div id="event-list-cal-days-div">
		<label for="event-list-cal-event-days" style="width: 100px; display: inline-block;"><?php _e( 'Event Days', 'event-list-calendar' ); ?></label>
		<input id="event-list-cal-event-days" type="number" name="event-list-cal-event-days" min="1" max="31" value="<?php echo $event_days; ?>">
	</div>
	<div id="event-list-cal-repeat-div" style="padding-top: 1em;">
		<label for="event-list-cal-event-repeat" style="width: 100px; display: inline-block;"><?php _e( 'Repeat Event?', 'event-list-calendar' ); ?></label>
		<input id="event-list-cal-event-repeat" type="checkbox" name="event-list-cal-event-repeat" value="1"<?php echo $checked; ?>>
		<div id="repeat-schedule" style="display: inline-block;">
			<label for="event-list-cal-event-repeat-schedule" style="width: 100px; display: none;"><?php _e( 'How Often', 'event-list-calendar' ); ?></label>
			<select id="event-list-cal-event-repeat-schedule" name="event-list-cal-event-repeat-schedule">
				<option value="1"<?php echo $weekly; ?>><?php _e( 'Weekly', 'event-list-calendar' ); ?></option>
				<option value="2"<?php echo $monthly; ?>><?php _e( 'Monthly', 'event-list-calendar' ); ?></option>
				<option value="3"<?php echo $yearly; ?>><?php _e( 'Yearly', 'event-list-calendar' ); ?></option>
			</select>
		</div>
		<div id="event-list-cal-repeat-end-div" style="display: none;">
			<div id="event-list-cal-event-repeat-end-div" style="padding-top: 1em;">
				<label for="event-list-cal-event-end-checkbox" style="width: 100px; display: inline-block;"> <?php _e( 'Forever?', 'event-list-calendar' ); ?></label>
				<input id="event-list-cal-event-end-checkbox" type="checkbox" name="event-list-cal-event-end-checkbox" value="1"<?php echo $checked_2; ?>>
			</div>
			<div id="event-list-cal-event-repeat-end-date-div" style="padding-top: 1em;<?php echo $end_display; ?>">
				<label for="event-list-cal-event-end" style="width: 100px; display: inline-block;"> <?php _e( 'End Date', 'event-list-calendar' ); ?></label>
				<input id="event-list-cal-event-end" type="text" name="event-list-cal-event-end" placeholder="YYYY-MM-DD" value="<?php echo $event_end; ?>">
			</div>
		</div>
	</div>
<?php
}





function event_list_cal_meta( $post_id ) {

	if ( 'event-list-cal' != $_POST['post_type'] ) {
		return;
	}

	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST['event-list-cal-nonce'] ) && ( wp_verify_nonce( $_POST['event-list-cal-nonce'], basename( __FILE__ ) ) ) ) ? true : false;

	if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
		return;
	}

	if ( isset( $_POST['event-list-cal-event-date'] ) ) {
		update_post_meta( $post_id, 'event-date', $_POST['event-list-cal-event-date']  );
	}
	if ( isset( $_POST['event-list-cal-event-time'] ) ) {
		update_post_meta( $post_id, 'event-time', $_POST['event-list-cal-event-time'] );
	}
	if(($_POST['event-list-cal-event-days'] > 1 && $_POST['event-list-cal-event-days'] <= 31) || !isset($_POST['event-list-cal-event-repeat'])) {

		update_post_meta( $post_id, 'event-days', $_POST['event-list-cal-event-days'] );
		update_post_meta( $post_id, 'event-repeat', 0 );
		update_post_meta( $post_id, 'event-end', 0 );

	} else {

		if($_POST['event-list-cal-event-repeat'] == 1) {

			update_post_meta( $post_id, 'event-days', 1 );
			update_post_meta( $post_id, 'event-repeat', $_POST['event-list-cal-event-repeat-schedule'] );

			if(!isset($_POST['event-list-cal-event-end-checkbox'])) {
				update_post_meta( $post_id, 'event-end', $_POST['event-list-cal-event-end'] );
			} else {
				update_post_meta( $post_id, 'event-end', 0 );
			}

		}
	}
}
add_action( 'save_post', 'event_list_cal_meta' );






function event_list_cal_admin_script_style( $hook ) {

	if ( 'post.php' == $hook || 'post-new.php' == $hook ) {
		wp_enqueue_script( 'events', plugin_dir_url(__FILE__) . 'assets/js/scripts.js', array( 'jquery', 'jquery-ui-datepicker' ), '0.1', true );
		wp_enqueue_style( 'jquery-ui-calendar', plugin_dir_url(__FILE__) . 'assets/css/jquery-ui.css', false, '1.11.1', 'all' );
	}
}
add_action( 'admin_enqueue_scripts', 'event_list_cal_admin_script_style' );





function event_list_cal_head() {
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.plugin_dir_url(__FILE__).'assets/css/event-list-cal.css">';
	if(get_option('event_list_cal_theme') && get_option('event_list_cal_theme') != 'light') {
		echo '<link rel="stylesheet" type="text/css" media="screen" href="'.plugin_dir_url(__FILE__).'assets/css/themes/'.get_option('event_list_cal_theme').'.css">';
	}
}
add_action( 'wp_head', 'event_list_cal_head' );





function event_list_cal_footer() {
	echo '<script type="text/javascript" src="'.plugin_dir_url(__FILE__).'assets/js/today.js"></script>';
}
add_action( 'wp_footer', 'event_list_cal_footer' );





class EventListCal {

	private $options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_plugin_pages' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
	}

	public function add_plugin_pages() {

		add_submenu_page(
			'edit.php?post_type=event-list-cal',
			'Settings Admin',
			'About',
			'manage_options',
			'about',
			array( $this, 'create_about_page' )
		);
		add_submenu_page(
			'edit.php?post_type=event-list-cal',
			'Settings Admin',
			'Settings',
			'manage_options',
			'settings',
			array( $this, 'create_settings_page' )
		);
	}

	public function create_about_page() {
		?>
		<div class="wrap">
			<h2><?php _e('How to Use Event List Calendar', 'event-list-calendar'); ?></h2>
			<p><?php _e('Plugin created by <a href="http://ryanfait.com/" target="_blank">Ryan Fait</a>.', 'event-list-calendar'); ?></p>
			<h3><?php _e('Shortcodes', 'event-list-calendar'); ?></h3>
			<p><?php _e('This plugin enables the use of two shortcodes, <code>[calendar]</code> and <code>[upcoming-events]</code>.', 'event-list-calendar'); ?></p>
			<p><?php _e('Simply copy and paste a shortcode into a page, post or a text widget, and the calendar or upcoming event list will be displayed.', 'event-list-calendar'); ?></p>
			<h4><?php _e('Calendar Shortcode', 'event-list-calendar'); ?></h4>
			<p><?php _e('The <code>[calendar]</code> shortcode will display a full-size calendar of the current month. If you want to start the calendar on a specific month, you can do so by adding month and year attributes. For example, <code>[calendar year="2015" month="09"]</code>.', 'event-list-calendar'); ?></p>
			<h4><?php _e('Mini Calendar Shortcode', 'event-list-calendar'); ?></h4>
			<p><?php _e('The shortcode <code>[mini-calendar]</code> displays a smaller Ajax calendar more suited for use in text widgets and sidebars.', 'event-list-calendar'); ?></p>
			<h4><?php _e('Upcoming Events Shortcode', 'event-list-calendar'); ?></h4>
			<p><?php _e('By default, the <code>[upcoming-events]</code> shortcode shows the next five upcoming events. You can specify the number of events you want to display like this: <code>[upcoming-events num_events="3"]</code>.', 'event-list-calendar'); ?></p>
			<p><?php _e('You can also filter an upcoming events list by categories. Use the category slug(s) separated by commas. <code>[upcoming-events categories="birthdays,holidays"]</code>', 'event-list-calendar'); ?></p>
			<h3><?php _e('More Information', 'event-list-calendar'); ?></h3>
			<p><?php _e('For more information about this plugin, <a href="http://ryanfait.com/resources/wordpress-event-list-calendar-plugin/" target="_blank">view the documentation here</a>.', 'event-list-calendar'); ?></p>
			<p><?php _e('This work is licensed under a <a rel="license" href="http://www.gnu.org/licenses/gpl.html" target="_blank">GNU General Public License (GPL) version 3</a>.', 'event-list-calendar'); ?></p>
			<h4><?php _e('Thanks', 'event-list-calendar'); ?></h4>
			<p><?php _e('Special thanks to <a href="http://www.benmarshall.me/wordpress-ajax-frontend-backend/" target="_blank">Ben Marshall\'s post</a> on using Ajax with WordPress.', 'event-list-calendar'); ?></p>
			<h2><?php _e('Donate', 'event-list-calendar'); ?></h2>
			<p><?php _e('I release all my software and other web design resources for free. If you use my work and like it, consider a small donation!', 'event-list-calendar'); ?></p>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHLwYJKoZIhvcNAQcEoIIHIDCCBxwCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYB5K4ueoLXM1jeustqHqKBljaF46TVCs9vDFmv8qwyKNmOo3SIo3GA5Slr8P6mmVmH7wQovJcnDv043xjfZzlxoI6aYvsR3+1XdTjVs15kHjTir00TGJn5wgO/ud/E4jbqvoI8m6gyE5tyzxkmmomCPsatwjQPae2ePFVL4sJ7rKDELMAkGBSsOAwIaBQAwgawGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQIFHMEDaZfIUeAgYjqaJYsFWz6iEjFXcABgPW1RUJfGh4fQLibjgoQ4bZimuFTwv4DWeVe3dps6iIX2D4J4l164ih8SkkSn1+aed9cw0vYFE75cF1Ny2NT+gKb/a530R0eDiy+r1ChNryyOkKy2HwNWZFSgJ0o/F6DuO5YIJv/3tExnwjCsOqAaf1ND41v1D9k4spIoIIDhzCCA4MwggLsoAMCAQICAQAwDQYJKoZIhvcNAQEFBQAwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMB4XDTA0MDIxMzEwMTMxNVoXDTM1MDIxMzEwMTMxNVowgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDBR07d/ETMS1ycjtkpkvjXZe9k+6CieLuLsPumsJ7QC1odNz3sJiCbs2wC0nLE0uLGaEtXynIgRqIddYCHx88pb5HTXv4SZeuv0Rqq4+axW9PLAAATU8w04qqjaSXgbGLP3NmohqM6bV9kZZwZLR/klDaQGo1u9uDb9lr4Yn+rBQIDAQABo4HuMIHrMB0GA1UdDgQWBBSWn3y7xm8XvVk/UtcKG+wQ1mSUazCBuwYDVR0jBIGzMIGwgBSWn3y7xm8XvVk/UtcKG+wQ1mSUa6GBlKSBkTCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb22CAQAwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOBgQCBXzpWmoBa5e9fo6ujionW1hUhPkOBakTr3YCDjbYfvJEiv/2P+IobhOGJr85+XHhN0v4gUkEDI8r2/rNk1m0GA8HKddvTjyGw/XqXa+LSTlDYkqI8OwR8GEYj4efEtcRpRYBxV8KxAW93YDWzFGvruKnnLbDAF6VR5w/cCMn5hzGCAZowggGWAgEBMIGUMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbQIBADAJBgUrDgMCGgUAoF0wGAYJKoZIhvcNAQkDMQsGCSqGSIb3DQEHATAcBgkqhkiG9w0BCQUxDxcNMTQwODI5MDUwMzQ5WjAjBgkqhkiG9w0BCQQxFgQUgJFRdwNRDAeCHDsuZIIaffC53KEwDQYJKoZIhvcNAQEBBQAEgYBcPS8k0MhF84q3FSC85rMTH7YWbUJKxaS6+UIZHiTA/wHI0FjxQMl7TKpmTw+6aQGDM3WJMjP/91k0rD9i1D+N+a7qow0yRXLnsQLVEXnbLoYnpywMd3ZQMKxG2Cp0B2mGN1n/9nBxHMo/1YS4oF5fs74sigvuUvbtTAuVMAcueg==-----END PKCS7-----">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
		</div>
<?php
	}

	public function create_settings_page() {

		$this->options = get_option( 'event_list_cal_settings' );
		?>
		<div class="wrap">
			<h2><?php _e('Event List Calendar Settings', 'event-list-calendar'); ?></h2>
			<form method="post" action="options.php">
				<?php
				settings_fields( 'event_list_cal_settings' );   
				do_settings_sections( 'event-list-cal-settings' );
				submit_button(); 
				?>
			</form>
		</div>
		<?php
	}

	public function page_init() {

		register_setting(
			'event_list_cal_settings', // Option group
			'event_list_cal_settings', // Option name
			array( $this, 'sanitize' ) // Sanitize
		);

		add_settings_section(
			'event_list_cal_date_format_section', // ID
			'Date Format Settings', // Title
			array( $this, 'print_date_info' ), // Callback
			'event-list-cal-settings' // Page
		);

		add_settings_field(
			'event_list_cal_upcoming_date_format', // ID
			'Upcoming Events Date', // Title 
			array( $this, 'event_list_cal_upcoming_date_format_callback' ), // Callback
			'event-list-cal-settings', // Page
			'event_list_cal_date_format_section' // Section		   
		);

		add_settings_field(
			'event_list_cal_single_date_format', 
			'Single Events Page Format', 
			array( $this, 'event_list_cal_single_date_format_callback' ), 
			'event-list-cal-settings', 
			'event_list_cal_date_format_section'
		);

		add_settings_section(
			'event_list_cal_theme_section', // ID
			'Calendar Theme', // Title
			array( $this, 'print_theme_info' ), // Callback
			'event-list-cal-settings' // Page
		);

		add_settings_field(
			'event_list_cal_theme', // ID
			'Choose a Theme', // Title 
			array( $this, 'event_list_cal_theme_callback' ), // Callback
			'event-list-cal-settings', // Page
			'event_list_cal_theme_section' // Section		   
		);

	}

	public function sanitize( $input ) {

		$new_input = array();
		if( isset( $input['event_list_cal_upcoming_date_format'] ) ) {
			$new_input['event_list_cal_upcoming_date_format'] = sanitize_text_field( $input['event_list_cal_upcoming_date_format'] );
			update_option('event_list_cal_upcoming_date_format', $new_input['event_list_cal_upcoming_date_format']);
		}
		if( isset( $input['event_list_cal_single_date_format'] ) ) {
			$new_input['event_list_cal_single_date_format'] = sanitize_text_field( $input['event_list_cal_single_date_format'] );
			update_option('event_list_cal_single_date_format', $new_input['event_list_cal_single_date_format']);
		}
		if( isset( $input['event_list_cal_theme'] ) ) {
			update_option('event_list_cal_theme', $input['event_list_cal_theme']);
		}

		return $new_input;
	}

	public function print_date_info() {

		_e('<p>You can choose your own date formats for the upcoming events list and the dates that appear at above the content on single event pages.</p><p><b>NOTE:</b> Leave a text field empty to return it to its default. <a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Documentation on date and time formatting</a>.</p>', 'event-list-calendar');
	}

	public function print_theme_info() {

	//	_e('<p>Choose a theme.</p>', 'event-list-calendar');
	}

	public function event_list_cal_upcoming_date_format_callback() {

		if(isset( $this->options['event_list_cal_upcoming_date_format'] )) {
			$value = esc_attr( $this->options['event_list_cal_upcoming_date_format'] );
			if(esc_attr( $this->options['event_list_cal_upcoming_date_format'] ) == '') {
				$value = 'Y • m • d';
				//update_option('event_list_cal_upcoming_date_format', 'Y • m • d');
				delete_option('event_list_cal_upcoming_date_format');
			}
		} else {
			$value = 'Y • m • d';
			update_option('event_list_cal_upcoming_date_format', 'Y • m • d');
		}

		$html = '<input type="text" id="event_list_cal_upcoming_date_format" name="event_list_cal_settings[event_list_cal_upcoming_date_format]" value="'.$value.'"> <span id="event-list-cal-upcoming-format">'.date($value, time()).'</span>';

		echo $html;
	}

	public function event_list_cal_single_date_format_callback() {

		if(isset( $this->options['event_list_cal_single_date_format'] )) {
			$value = esc_attr( $this->options['event_list_cal_single_date_format'] );
			if(esc_attr( $this->options['event_list_cal_single_date_format'] ) == '') {
				$value = get_option('date_format');
				//update_option('event_list_cal_single_date_format', get_option('date_format'));
				delete_option('event_list_cal_single_date_format');
			}
		} else {
			$value = get_option( 'date_format' );
			update_option('event_list_cal_single_date_format', get_option('date_format'));
		}

		$html = '<input type="text" id="event_list_cal_single_date_format" name="event_list_cal_settings[event_list_cal_single_date_format]" value="'.$value.'"> <span id="event-list-cal-single-format">'.date($value, time()).'</span>';
		
		echo $html;
	}

	public function event_list_cal_theme_callback() {

		if(get_option('event_list_cal_theme')) {
			$selected = get_option('event_list_cal_theme');
		} else {
			$selected = 'light';
		}

		$html = '<select id="event_list_cal_theme" name="event_list_cal_settings[event_list_cal_theme]">
			<option value="light"';

		if($selected == 'light') {
			$html .= ' selected="selected"';
		}

		$html .= '>Light</option>
			<option value="dark"';

		if($selected == 'dark') {
			$html .= ' selected="selected"';
		}

		$html .= '>Dark</option>
		 	<option value="blue"';

		if($selected == 'blue') {
			$html .= ' selected="selected"';
		}

		$html .= '>Blue</option>
		 	<option value="2014"';

		if($selected == '2014') {
			$html .= ' selected="selected"';
		}

		$html .= '>2014</option>
		</select>';
		
		echo $html;
	}
}

if( is_admin() )
	$my_settings_page = new EventListCal();





function event_list_cal_scripts() {
	wp_enqueue_script( 'script-name', plugin_dir_url(__FILE__).'assets/js/ajax.js', array('jquery'), '1.0.0', true );
	wp_localize_script( 'script-name', 'eventListCal', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'security' => wp_create_nonce( 'event-list-cal' ) ));
	wp_localize_script( 'script-name', 'eventListMiniCal', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'security' => wp_create_nonce( 'event-list-mini-cal' ) ));
}
add_action( 'wp_enqueue_scripts', 'event_list_cal_scripts' );




function event_list_cal_callback() {
	check_ajax_referer( 'event-list-cal', 'security' );
 
	$cal_output = "";
	
	$month = intval( $_POST["month"] );
	$year = intval( $_POST["year"] );

	$calendar_month = strtotime($year."-".$month."-01");
	$current_month = 1;

	if($year == date('Y', time()) && $month == date('m', time())) {
		$current_month = 1;
	} else {
		$current_month = 0;
	}	

	$events = array();

	$args = array(
				'post_type'			=> 'event-list-cal',
				'posts_per_page'	=> -1,
			);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		$event_date = get_post_custom_values('event-date');
		$event_date = strtotime($event_date[0]);
		$event_time = get_post_custom_values('event-time');
		$event_time = $event_time[0];
		$event_days = get_post_custom_values('event-days');
		$event_days = $event_days[0];
		$event_repeat = get_post_custom_values('event-repeat');
		$event_repeat = $event_repeat[0];
		$event_end = get_post_custom_values('event-end');
		$event_end = $event_end[0];
		if($event_repeat > 0) {
			$event_repeat_schedule = $event_repeat;
		} else {
			$event_repeat_schedule = 0;
		}
		$events[] = "<a href=\"".get_permalink($loop->ID)."\">".get_the_title()."</a>==".$event_date."==".$event_time."==<a href=\"".get_permalink($loop->ID)."\">&nbsp;</a>".get_the_excerpt()."==".$event_days."==".$event_repeat_schedule."==".$event_end;
	endwhile;

	$num_days = date('t', mktime(0, 0, 0, $month, 1, $year));
	$strt_day = date('w', mktime(0, 0, 0, $month, 1, $year));

	/* Handle multiple day events from previous months and recurring events */

	foreach($events as $event) {
		$event_array = split('==', $event);
		$event_link = $event_array[0];
		$event_date = intval($event_array[1]);
		$event_time = $event_array[2];
		$event_excerpt = $event_array[3];
		$event_days = $event_array[4];
		if($event_array[5] > 0) {
			$event_repeat_schedule = $event_array[5];
		} else {
			$event_repeat_schedule = 0;
		}
		if($event_array[6]) {
			$event_end = $event_array[6];
		} else {
			$event_end = '2038-01-19';
		}

		$event_year = date('Y', $event_date);
		$event_month = date('m', $event_date);
		$event_day = date('d', $event_date);
	
		if($month == 1) {
			if($event_year == ($year - 1) && $event_month == 12 && !empty($event_days)) {
				$num_days_prev_month = date('t', mktime(0, 0, 0, $month, 1, ($year - 1)));

				if($event_days > ($num_days_prev_month - $event_day)) {

					$days_to_go = abs($num_days_prev_month - $event_day - $event_days + 1);
					for($i = 1; $i <= $days_to_go; $i++) {
						$new_date = ($year."-".$month."-".$i);
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==".$event_end;
					}
				}
			}
		} else {
			if($event_year == $year && $event_month == ($month - 1) && !empty($event_days)) {
				$num_days_prev_month = date('t', mktime(0, 0, 0, ($month - 1), 1, $year));
				
				if($event_days > ($num_days_prev_month - $event_day)) {

					$days_to_go = abs($num_days_prev_month - $event_day - $event_days + 1);
					for($i = 1; $i <= $days_to_go; $i++) {
						$new_date = ($year."-".$month."-".$i);
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==".$event_end;
					}
				}
			}
		}

		/* recurring events */

		if($event_repeat_schedule == 1) {
			/* check to make sure date starts in the current month or if it is after $event_date */
			if($event_year == $year && $event_month == $month) {
				$add_seven = $event_day;
				for($i = 0; $i < 5; $i++) {
					$add_seven = $add_seven + 7;
					$new_date = $year."-".$month."-".$add_seven;
					if(strtotime($new_date) <= strtotime($event_end)) {
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==".$event_end;
					}
				}
			} elseif(strtotime($year."-".$month."-01") > $event_date) {
				/* get day of week it is on */
				$day_of_week = date('w', $event_date) + 1;
				$add_seven = $day_of_week - $strt_day;
				for($i = 0; $i < 5; $i++) {
					$new_date = $year."-".$month."-".$add_seven;
					if(strtotime($new_date) <= strtotime($event_end)) {
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==".$event_end;
					}
					$add_seven = $add_seven + 7;
				}
			}
		} elseif($event_repeat_schedule == 2) {
			if(strtotime($year."-".$month."-01") > $event_date && strtotime($year."-".$month."-".date('d', $event_date)) <= strtotime($event_end)) {
				$events[] = $event_link."==".strtotime($year."-".$month."-".$event_day)."==".$event_time."==".$event_excerpt."==0==".$event_end;
			}
		} elseif($event_repeat_schedule == 3) {
			if(strtotime($year."-".$month."-01") > $event_date && $month == $event_month && strtotime($year."-".$month."-".date('d', $event_date)) <= strtotime($event_end)) {
				$events[] = $event_link."==".strtotime($year."-".$month."-".$event_day)."==".$event_time."==".$event_excerpt."==0==".$event_end;
			}
		}
	}

	/* Draw calendar */

	$cal_output .= "
		<table class=\"event-list-cal\" id=\"".$month."-".$year."-full-".get_bloginfo('language')."\">
			<thead>
				<tr>";
	if(get_settings('start_of_week') != 1) {
		$cal_output .= "
					<th>".__('Sunday', 'event-list-calendar')."</th>";
	}
	$cal_output .= "
					<th>".__('Monday', 'event-list-calendar')."</th>
					<th>".__('Tuesday', 'event-list-calendar')."</th>
					<th>".__('Wednesday', 'event-list-calendar')."</th>
					<th>".__('Thursday', 'event-list-calendar')."</th>
					<th>".__('Friday', 'event-list-calendar')."</th>
					<th>".__('Saturday', 'event-list-calendar')."</th>";
	if(get_settings('start_of_week') == 1) {
		$cal_output .= "
					<th>".__('Sunday', 'event-list-calendar')."</th>";
	}
	$cal_output .= "
				</tr>
			</thead>
			<tbody>
				<tr>";
	$k = 0;
	if(get_settings('start_of_week') != 1) {
		for($i = 0; $i < $strt_day; $i++) {
			$cal_output .= "
						<td>&nbsp;</td>\r";
			$k++;
		}
	} else {
		for($i = 1; $i < $strt_day; $i++) {
			$cal_output .= "
						<td>&nbsp;</td>\r";
			$k++;
		}
	}
	$x = $k + 1;
	for($j = 1; $j <= $num_days; $j++) {

		if($x == 6 || $x == 7 || $x == 13 || $x == 14 || $x == 20 || $x == 21 || $x == 27 || $x == 28 || $x == 34 || $x == 35) {
			$class = ' class="event-list-cal-right"';
		}
		if($j == current_time('j', 0) && $current_month == 1) {
			if($x == 6 || $x == 7 || $x == 13 || $x == 14 || $x == 20 || $x == 21 || $x == 27 || $x == 28 || $x == 34 || $x == 35) {
				$class = ' class="today event-list-cal-right"';
			} else {
				$class = ' class="today"';
			}
		}

		$cal_output .= "
					<td".$class.">
						<div class=\"event-list-cal-day\">".$j."</div>";

		foreach($events as $event) {

			$event_array = split('==', $event);
			$event_link = $event_array[0];
			$event_date = intval($event_array[1]);
			$event_time = $event_array[2];
			$event_excerpt = $event_array[3];
			$event_days = $event_array[4];
			$event_repeat = $event_array[5];

			$event_year = date('Y', $event_date);
			$event_month = date('m', $event_date);
			$event_day = date('d', $event_date);

			if($event_year == $year && $event_month == $month && $event_day == $j) {
				$cal_output .= "
						<div class=\"event-list-cal-single\">
							<p>".$event_link."</p>
							<div class=\"event-list-cal-excerpt\">";
				if(!empty($event_time)) {
					$cal_output .= "
								<p class=\"event-list-cal-time\">Event Time: ".$event_time."</p>";
				}
				$cal_output .= "
								".$event_excerpt."
							</div>
						</div>\r";

				/* If multiple days, add to $events[] */
				
				if(!empty($event_days)) {
					$new_event_date = $event_date + 86400;
					while($event_days > 1) {
						$event_days = $event_days - 1;
						$events[] = $event_link."==".$new_event_date."==".$event_time."==".$event_excerpt."==0==0==0";
						$new_event_date = $new_event_date + 86400;
					}
				}
			}
		}

		$cal_output .= "
					</td>";
		$class = "";
		$k++;
		if($k % 7 == 0) {
			$cal_output .= "
				</tr>
				<tr>";
		}
		$x++;
	}
	if($x > 36) {
		while($x <= 42 ) {
			$cal_output .= "
					<td></td>";
			$x++;
		}
	} elseif($x > 29 && $x != 36) {
		while($x <= 35) {
			$cal_output .= "
					<td></td>";
			$x++;
		}
	}
	$cal_output .= "
				</tr>
			</tbody>
		</table>
";
	
	$cal_output .= $not_current_month;

	echo $cal_output;

	die();
}
add_action( 'wp_ajax_event_list_cal', 'event_list_cal_callback' );
add_action( 'wp_ajax_nopriv_event_list_cal', 'event_list_cal_callback' );





function event_list_mini_cal_callback() {
	check_ajax_referer( 'event-list-mini-cal', 'security' );

	$cal_output = "";

	$month = intval( $_POST["month"] );
	$year = intval( $_POST["year"] );

	$calendar_month = strtotime($year."-".$month."-01");
	$current_month = 1;

	if(isset($_GET['month'])) {
		$calendar_month = strtotime($_GET['month']."-01");
		$date = split('-', $_GET['month']);
		$year = $date[0];
		$month = $date[1];
		if($year != current_time('Y', 0) || $month != current_time('m', 0)) {
			$current_month = 0;
		}
	}
	

	$events = array();

	$args = array(
				'post_type'			=> 'event-list-cal',
				'posts_per_page'	=> -1,
			);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		$event_date = get_post_custom_values('event-date');
		$event_date = strtotime($event_date[0]);
		$event_time = get_post_custom_values('event-time');
		$event_time = $event_time[0];
		$event_days = get_post_custom_values('event-days');
		$event_days = $event_days[0];
		$event_repeat = get_post_custom_values('event-repeat');
		$event_repeat = $event_repeat[0];
		$event_end = get_post_custom_values('event-end');
		$event_end = $event_end[0];
		if($event_repeat > 0) {
			$event_repeat_schedule = $event_repeat;
		} else {
			$event_repeat_schedule = 0;
		}
		$events[] = "<a href=\"".get_permalink($loop->ID)."\">".get_the_title()."</a>==".$event_date."==".$event_time."==<a href=\"".get_permalink($loop->ID)."\">&nbsp;</a>".get_the_excerpt()."==".$event_days."==".$event_repeat_schedule."==".$event_end;
	endwhile;

	$num_days = date('t', mktime(0, 0, 0, $month, 1, $year));
	$strt_day = date('w', mktime(0, 0, 0, $month, 1, $year));

	/* Handle multiple day events from previous months */

	foreach($events as $event) {
		$event_array = split('==', $event);
		$event_link = $event_array[0];
		$event_date = intval($event_array[1]);
		$event_time = $event_array[2];
		$event_excerpt = $event_array[3];
		$event_days = $event_array[4];
		$event_repeat_schedule = $event_array[5];
		$event_end = $event_array[6];
		
		if($event_end == 0) {
			$event_end = '2038-01-19';
		}

		$event_year = date('Y', $event_date);
		$event_month = date('m', $event_date);
		$event_day = date('d', $event_date);
	
		if($month == 1) {
			if($event_year == ($year - 1) && $event_month == 12 && !empty($event_days)) {
				$num_days_prev_month = date('t', mktime(0, 0, 0, $month, 1, ($year - 1)));

				if($event_days > ($num_days_prev_month - $event_day)) {

					$days_to_go = abs($num_days_prev_month - $event_day - $event_days + 1);
					for($i = 1; $i <= $days_to_go; $i++) {
						$new_date = ($year."-".$month."-".$i);
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==0";
					}
				}
			}
		} else {
			if($event_year == $year && $event_month == ($month - 1) && !empty($event_days)) {
				$num_days_prev_month = date('t', mktime(0, 0, 0, ($month - 1), 1, $year));
				
				if($event_days > ($num_days_prev_month - $event_day)) {

					$days_to_go = abs($num_days_prev_month - $event_day - $event_days + 1);
					for($i = 1; $i <= $days_to_go; $i++) {
						$new_date = ($year."-".$month."-".$i);
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==0";
					}
				}
			}
		}

		/* Handle recurring events - All posibilities need to be addressed due to the ability to start a calendar on a specific month */

		if($event_repeat_schedule == 1) {
			/* check to make sure date starts in the current month or if it is after $event_date */
			if($event_year == $year && $event_month == $month) {
				$add_seven = $event_day;
				for($i = 0; $i < 5; $i++) {
					$add_seven = $add_seven + 7;
					$new_date = $year."-".$month."-".$add_seven;
					if(strtotime($new_date) <= strtotime($event_end)) {
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==".$event_end;
					}
				}
			} elseif(strtotime($year."-".$month."-01") > $event_date) {
				/* get day of week it is on */
				$day_of_week = date('w', $event_date) + 1;
				$add_seven = $day_of_week - $strt_day;
				for($i = 0; $i < 5; $i++) {
					$new_date = $year."-".$month."-".$add_seven;
					if(strtotime($new_date) <= strtotime($event_end)) {
						$events[] = $event_link."==".strtotime($new_date)."==".$event_time."==".$event_excerpt."==0==".$event_end;
					}
					$add_seven = $add_seven + 7;
				}
			}
		} elseif($event_repeat_schedule == 2) {
			if(strtotime($year."-".$month."-01") > $event_date && strtotime($year."-".$month."-".date('d', $event_date)) <= strtotime($event_end)) {
				$events[] = $event_link."==".strtotime($year."-".$month."-".$event_day)."==".$event_time."==".$event_excerpt."==0==0";
			}
		} elseif($event_repeat_schedule == 3) {
			if(strtotime($year."-".$month."-01") > $event_date && $month == $event_month && strtotime($year."-".$month."-".date('d', $event_date)) <= strtotime($event_end)) {
				$events[] = $event_link."==".strtotime($year."-".$month."-".$event_day)."==".$event_time."==".$event_excerpt."==0==0";
			}
		}
	}

	/* Draw calendar */

	$cal_output .= "
		<table class=\"event-list-cal event-list-mini-cal\" id=\"".$month."-".$year."-mini-".get_bloginfo('language')."\">
			<thead>
				<tr>";
	if(get_settings('start_of_week') != 1) {
		$cal_output .= "
					<th>".__( 'Sun', 'event-list-calendar' )."</th>";
	}
	$cal_output .= "
					<th>".__( 'Mon', 'event-list-calendar' )."</th>
					<th>".__( 'Tue', 'event-list-calendar' )."</th>
					<th>".__( 'Wed', 'event-list-calendar' )."</th>
					<th>".__( 'Thu', 'event-list-calendar' )."</th>
					<th>".__( 'Fri', 'event-list-calendar' )."</th>
					<th>".__( 'Sat', 'event-list-calendar' )."</th>";
	if(get_settings('start_of_week') == 1) {
		$cal_output .= "
					<th>".__( 'Sun', 'event-list-calendar' )."</th>";
	}
	$cal_output .= "
				</tr>
			</thead>
			<tbody>
				<tr>";
	$k = 0;
	if(get_settings('start_of_week') != 1) {
		for($i = 0; $i < $strt_day; $i++) {
			$cal_output .= "
						<td class=\"event-list-cal-blank\">&nbsp;</td>\r";
			$k++;
		}
	} else {
		for($i = 1; $i < $strt_day; $i++) {
			$cal_output .= "
						<td class=\"event-list-cal-blank\">&nbsp;</td>\r";
			$k++;
		}
	}
	$x = $k + 1;
	for($j = 1; $j <= $num_days; $j++) {

		if($x == 5 || $x == 6 || $x == 7 || $x == 12 || $x == 13 || $x == 14 || $x == 19 || $x == 20 || $x == 21 || $x == 26 || $x == 27 || $x == 28 || $x == 33 || $x == 34 || $x == 35) {
			$class = ' class="event-list-cal-right"';
		}
		if($j == current_time('j', 0) && $current_month == 1) {
			if($x == 5 || $x == 6 || $x == 7 || $x == 12 || $x == 13 || $x == 14 || $x == 19 || $x == 20 || $x == 21 || $x == 26 || $x == 27 || $x == 28 || $x == 33 || $x == 34 || $x == 35) {
				$class = ' class="today event-list-cal-right"';
			} else {
				$class = ' class="today"';
			}
		}

		$cal_output .= "
					<td".$class.">
						";

		$day_events = array();

		foreach($events as $event) {

			$event_array = split('==', $event);
			$event_link = $event_array[0];
			$event_date = $event_array[1];
			$event_time = $event_array[2];
			$event_excerpt = $event_array[3];
			$event_days = $event_array[4];
			$event_repeat = $event_array[5];

			$event_year = date('Y', intval($event_date));
			$event_month = date('m', intval($event_date));
			$event_day = date('d', intval($event_date));

			if($event_year == $year && $event_month == $month && $event_day == $j) {
				$day_events[$j][] = $event_link;
				
				/* If multiple days, add to $events[] */
				
				if(!empty($event_days)) {
					$new_event_date = $event_date + 86400;
					while($event_days > 1) {
						$event_days = $event_days - 1;
						$events[] = $event_link."==".$new_event_date."==".$event_time."==".$event_excerpt."==0==".$event_repeat;
						$new_event_date = $new_event_date + 86400;
					}
				}
			}
		}

		if(!empty($day_events[$j])) {
			$cal_output .= '<span class="event-list-mini-cal-event"><div class="event-list-mini-cal-day">'.$j.'</div></div></b>';
			$cal_output .= '<div class="event-list-mini-cal-hover">';
			foreach($day_events[$j] as $event) {
				$cal_output .= '<div class="event-list-mini-cal-event-single-link">'.$event.'</div>';
			}
			$cal_output .= '</div>';
		} else {
			$cal_output .= '<div class="event-list-mini-cal-day">'.$j.'</div>';
		}

		$cal_output .= "
					</td>";
		$class = "";
		$k++;
		if($k % 7 == 0) {
			$cal_output .= "
				</tr>
				<tr>";
		}
		$x++;
	}
	if($x > 36) {
		while($x <= 42 ) {
			$cal_output .= "
					<td class=\"event-list-cal-blank\"></td>";
			$x++;
		}
	} elseif($x > 29 && $x != 36) {
		while($x <= 35) {
			$cal_output .= "
					<td class=\"event-list-cal-blank\"></td>";
			$x++;
		}
	}
	$cal_output .= "
				</tr>
			</tbody>
		</table>
";

	$cal_output .= $not_current_month;

	echo $cal_output;

	die();
}
add_action( 'wp_ajax_event_list_mini_cal', 'event_list_mini_cal_callback' );
add_action( 'wp_ajax_nopriv_event_list_mini_cal', 'event_list_mini_cal_callback' );




?>