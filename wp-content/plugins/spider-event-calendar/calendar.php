<?php
/*
Plugin Name: Spider Event Calendar
Plugin URI: https://web-dorado.com/products/wordpress-calendar.html
Description: Spider Event Calendar is a highly configurable product which allows you to have multiple organized events. Spider Event Calendar is an extraordinary user friendly extension.
Version: 1.4.26
Author: https://web-dorado.com/
License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/
$wd_spider_calendar_version="1.4.26";
// LANGUAGE localization.
function sp_calendar_language_load() {
  load_plugin_textdomain('sp_calendar', FALSE, basename(dirname(__FILE__)) . '/languages');
}
add_action('init', 'sp_calendar_language_load');

add_action('init', 'sp_cal_registr_some_scripts');
	
function	sp_cal_registr_some_scripts(){
  global $wd_spider_calendar_version;
  wp_register_script("Canlendar_upcoming", plugins_url("elements/calendar.js", __FILE__), array(), $wd_spider_calendar_version);
  wp_register_script("calendnar-setup_upcoming", plugins_url("elements/calendar-setup.js", __FILE__), array(), $wd_spider_calendar_version);
  wp_register_script("calenndar_function_upcoming", plugins_url("elements/calendar_function.js", __FILE__), array(), $wd_spider_calendar_version);
}

// Include widget.
require_once("widget_spider_calendar.php");
require_once("spidercalendar_upcoming_events_widget.php");
function current_page_url_sc() {
  if (is_home()) {
    $pageURL = site_url();
  }
  else {
    $pageURL = get_permalink();
  }
  return $pageURL;
}

function resolv_js_prob() {
  ?>
  <script>
    var xx_cal_xx = '&';
  </script>
  <?php
}
add_action('wp_head', 'resolv_js_prob');

function spider_calendar_scripts() {
  wp_enqueue_script('jquery');
  wp_enqueue_script('thickbox', NULL, array('jquery'));
  wp_enqueue_style('thickbox.css', '/' . WPINC . '/js/thickbox/thickbox.css', NULL, '1.0');
  wp_enqueue_style('thickbox');
}
add_action('wp_enqueue_scripts', 'spider_calendar_scripts');

$many_sp_calendar = 1;
function spider_calendar_big($atts) {
  if (!isset($atts['default'])) {
    $atts['theme'] = 13;
    $atts['default'] = 'month';
  }
  extract(shortcode_atts(array(
    'id' => 'no Spider catalog',
    'theme' => '13',
    'default' => 'month',
    'select' => 'month,list,day,week,',
  ), $atts));
  if (!isset($atts['select'])) {
    $atts['select'] = 'month,list,day,week,';
  }
  return spider_calendar_big_front_end($id, $theme, $default, $select);
}
add_shortcode('Spider_Calendar', 'spider_calendar_big');

function spider_calendar_big_front_end($id, $theme, $default, $select, $widget = 0) {
  require_once("front_end/frontend_functions.php");
  ob_start();
  global $many_sp_calendar;
  global $wpdb;
  
  if ($widget === 1) {
$themes = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'spidercalendar_widget_theme WHERE id=%d', $theme));
}
else{
$themes = $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'spidercalendar_theme WHERE id=%d', $theme));
}
  $cal_width = $themes->width; ?>
  <input type="hidden" id="cal_width<?php echo $many_sp_calendar ?>" value="<?php echo $cal_width ?>" /> 
  <div id='bigcalendar<?php echo $many_sp_calendar ?>'></div>
  <script> 
    var tb_pathToImage = "<?php echo plugins_url('images/loadingAnimation.gif', __FILE__) ?>";
    var tb_closeImage = "<?php echo plugins_url('images/tb-close.png', __FILE__) ?>"
	var randi;
    if (typeof showbigcalendar != 'function') {
      function showbigcalendar(id, calendarlink, randi,widget) {
        var xmlHttp;
        try {
          xmlHttp = new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
        }
        catch (e) {
          try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
          }
          catch (e) {
            try {
              xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {
              alert("No AJAX!?");
              return false;
            }
          }
        }
        xmlHttp.onreadystatechange = function () {
          if (xmlHttp.readyState == 4) {
            jQuery('#' + id).html(xmlHttp.responseText);
          }
        }
        xmlHttp.open("GET", calendarlink, false);
        xmlHttp.send();
	 jQuery(document).ready(function (){
     jQuery('#views_select').toggle(function () {	
    jQuery('#drop_down_views').stop(true, true).delay(200).slideDown(500);
  }, function () { 
    jQuery('#drop_down_views').stop(true, true).slideUp(500);	
  });
	});
if(widget!=1)
{
  if(jQuery(window).width() > 640)
  {
	jQuery('drop_down_views').hide();
		var parent_width = document.getElementById('bigcalendar'+randi).parentNode.clientWidth;
		var calwidth=  document.getElementById('cal_width'+randi).value;
		var responsive_width = (calwidth)/parent_width*100;
		document.getElementById('afterbig'+randi).setAttribute('style','width:'+responsive_width+'%;');
		jQuery('pop_table').css('height','100%');
  }
 else if(jQuery(jQuery('#bigcalendar'+randi).parent()).width() > 640)
  {
	jQuery('drop_down_views').hide();
		var parent_width = document.getElementById('bigcalendar'+randi).parentNode.clientWidth;
		var calwidth=  document.getElementById('cal_width'+randi).value;
		var responsive_width = (calwidth)/parent_width*100;
		document.getElementById('afterbig'+randi).setAttribute('style','width:'+responsive_width+'%;');
		jQuery('pop_table').css('height','100%');
  } 
	else
	{
			document.getElementById('afterbig'+randi).setAttribute('style','width:100%;');	
	}
}
        var thickDims, tbWidth, tbHeight;
        jQuery(document).ready(function ($) {
          thickDims = function () {
			jQuery('#TB_window iframe').css('margin-left','0%');
			jQuery('#TB_window iframe').css('margin-top','0%');
			jQuery('#TB_window iframe').css('margin-left','0%');
			jQuery('#TB_window iframe').css('margin-top','0%');			
			jQuery('#TB_window iframe').css('padding-left','0%');
			jQuery('#TB_window iframe').css('padding-top','0%');		
             var tbWindow = $('#TB_window'), H = $(window).height(), W = $(window).width(), w, h;
            if (tbWidth) {
              if (tbWidth < (W - 90)) w = tbWidth; else  w = W - 200;
            } else w = W - 200;
            if (tbHeight) {
              if (tbHeight < (H - 90)) h = tbHeight; else  h = H - 200;
            } else h = H - 200;			
            if (tbWindow.size()) {
              tbWindow.width(w).height(h);
              $('#TB_iframeContent').width(w).height(h - 27);
              tbWindow.css({'margin-left':'-' + parseInt((w / 2), 10) + 'px'});
              if (typeof document.body.style.maxWidth != 'undefined')
                tbWindow.css({'top':(H - h) / 2, 'margin-top':'0'});
            }
			 if(jQuery(window).width() < 640 ){
			  var tb_left = parseInt((w / 2), 10) + 20;
				jQuery('#TB_window').css('left', tb_left + 'px')
				jQuery('#TB_window').css('width','90%');
				jQuery('#TB_window').css('margin-top','-13%');
				jQuery('#TB_window iframe').css('height','100%');
				jQuery('#TB_window iframe').css('width','100%');
			}
			   if(jQuery(window).width() > 640 )
			   {
					jQuery('#TB_window').css('left','50%');
				}
		if (typeof popup_width_from_src != "undefined") {
				popup_width_from_src=jQuery('.thickbox-previewbigcalendar'+randi).attr('href').indexOf('tbWidth=');
				str=jQuery('.thickbox-previewbigcalendar'+randi).attr('href').substr(popup_width_from_src+8,150)
				find_amp=str.indexOf('&');
				width_orig=str.substr(0,find_amp);				
				find_eq=str.indexOf('=');
				height_orig=str.substr(find_eq+1,5);
			jQuery('#TB_window').css('max-width',width_orig+'px');
			jQuery('#TB_window iframe').css('max-width',width_orig+'px');
			jQuery('#TB_window').css('max-height',height_orig+'px');
			}			
			jQuery('#TB_window').css('background','none');
			jQuery('#TB_window').css('background-color','none');
			jQuery('#TB_window iframe').css('background-color','none');			
          };
          thickDims();
          $(window).resize(function () {
            thickDims();
			if(jQuery(window).width() < 640 ){
				jQuery('#TB_window').css('width','90%');
				jQuery('#TB_window').css('margin-top','-13%');
				jQuery('#TB_window iframe').css('height','100%');
				jQuery('#TB_window').css('height','100%');
			}		
if(jQuery(window).width() > 900 )
			   {
					jQuery('#TB_window').css('left','50%');						
				}
		  });		  
          $('a.thickbox-preview' + id).click(function () {
            tb_click.call(this);
            var alink = jQuery(this).parents('.available-theme').find('.activatelink'), link = '', href = jQuery(this).attr('href'), url, text;
            var reg_with = new RegExp(xx_cal_xx + "tbWidth=[0-9]+");	
            if (tbWidth = href.match(reg_with))
              tbWidth = parseInt(tbWidth[0].replace(/[^0-9]+/g, ''), 10);
            else
              tbWidth = jQuery(window).width() - 90;
            var reg_heght = new RegExp(xx_cal_xx + "tbHeight=[0-9]+");
            if (tbHeight = href.match(reg_heght))
              tbHeight = parseInt(tbHeight[0].replace(/[^0-9]+/g, ''), 10);
            else
              tbHeight = jQuery(window).height() - 60;
            jQuery('#TB_title').css({'background-color':'#222', 'color':'#dfdfdf'});
            jQuery('#TB_closeAjaxWindow').css({'float':'left'});
            jQuery('#TB_ajaxWindowTitle').css({'float':'right'}).html(link);			
            jQuery('#TB_iframeContent').width('100%');
            thickDims();			
            return false;			
          });		  	
        });
      }
    }	
    document.onkeydown = function (evt) {
      evt = evt || window.event;
      if (evt.keyCode == 27) {
        document.getElementById('sbox-window').close();
      }
    };
    <?php global $wpdb;
    $calendarr = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "spidercalendar_calendar WHERE id='%d'", $id));
    $year = ($calendarr->def_year ? $calendarr->def_year : date("Y"));
    $month = ($calendarr->def_month ? $calendarr->def_month : date("m"));
    $date = $year . '-' . $month;
    if ($default == 'day') {
      $date .= '-' . date('d');
    }
    if ($default == 'week') {
      $date .= '-' . date('d');
      $d = new DateTime($date);
      $weekday = $d->format('w');
      $diff = ($weekday == 0 ? 6 : $weekday - 1);
      if ($widget === 1) {
        $theme_row = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "spidercalendar_widget_theme WHERE id='%d'", $theme));
      }
      else {
        $theme_row = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "spidercalendar_theme WHERE id='%d'", $theme));
      }
      $weekstart = $theme_row->week_start_day;
      if ($weekstart == "su") {
        $diff = $diff + 1;
      }
      $d->modify("-$diff day");
      $d->modify("-1 day");
      $prev_date = $d->format('Y-m-d');
      $prev_month = add_0((int) substr($prev_date, 5, 2) - 1);
      $this_month = add_0((int) substr($prev_date, 5, 2));
      $next_month = add_0((int) substr($prev_date, 5, 2) + 1);
      if ($next_month == '13') {
        $next_month = '01';
      }
      if ($prev_month == '00') {
        $prev_month = '12';
      }
    }
    if ($widget === 1) {
      $default .= '_widget';
    }
    else {
    }
    ?> showbigcalendar('bigcalendar<?php echo $many_sp_calendar; ?>', '<?php echo add_query_arg(array(
      'action' => 'spiderbigcalendar_' . $default,
      'theme_id' => $theme,
      'calendar' => $id,
      'select' => $select,
      'date' => $date,
      'months' => (($default == 'week' || $default == 'week_widget') ? $prev_month . ',' . $this_month . ',' . $next_month : ''),
      'many_sp_calendar' => $many_sp_calendar,
      'cur_page_url' => urlencode(current_page_url_sc()),
      'widget' => $widget,
	  'rand' => $many_sp_calendar,
      ), admin_url('admin-ajax.php'));?>','<?php echo $many_sp_calendar; ?>','<?php echo $widget; ?>');	  
  </script>
<style>
#TB_iframeContent{
	height: 100% !important;
}
#TB_window{
	z-index: 1000000;
}
.screen-reader-text{
	display: none;
}
#afterbig<?php echo $many_sp_calendar; ?>{
	width: 100% !important;
}
#afterbig<?php echo $many_sp_calendar; ?> li{
	list-style: none;
}
</style>
  <?php
  $many_sp_calendar++;
  $calendar = ob_get_contents();
  ob_end_clean();
  return $calendar;
}

// Quick edit.
add_action('wp_ajax_spidercalendarinlineedit', 'spider_calendar_quick_edit');
add_action('wp_ajax_spidercalendarinlineupdate', 'spider_calendar_quick_update');
add_action('wp_ajax_upcoming', 'upcoming_widget');
function spider_calendar_quick_update() {
  $current_user = wp_get_current_user();
  if ($current_user->roles[0] !== 'administrator') {
    echo 'You have no permission.';
    die();
  }
  global $wpdb;
  if (isset($_POST['calendar_id']) && isset($_POST['calendar_title']) && isset($_POST['us_12_format_sp_calendar']) && isset($_POST['default_year']) && isset($_POST['default_month'])) {
    $wpdb->update($wpdb->prefix . 'spidercalendar_calendar', array(
        'title' => esc_sql(esc_html(stripslashes($_POST['calendar_title']))),
        'time_format' => esc_sql(esc_html(stripslashes($_POST['us_12_format_sp_calendar']))),
        'def_year' => esc_sql(esc_html(stripslashes($_POST['default_year']))),
        'def_month' => esc_sql(esc_html(stripslashes($_POST['default_month']))),
      ), array('id' => esc_sql(esc_html(stripslashes($_POST['calendar_id'])))), array(
        '%s',
        '%d',
        '%s',
        '%s',
      ), array('%d'));
    $row = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "spidercalendar_calendar WHERE id='%d'", (int) $_POST['calendar_id']));
    ?>
  <td><?php echo $row->id; ?></td>
  <td class="post-title page-title column-title">
    <a title="Manage Events" class="row-title" href="admin.php?page=SpiderCalendar&task=show_manage_event&calendar_id=<?php echo $row->id; ?>"><?php echo $row->title; ?></a>
    <div class="row-actions">
      <span class="edit">
        <a href="admin.php?page=SpiderCalendar&task=edit_calendar&id=<?php echo $row->id; ?>" title="Edit This Calendar">Edit</a> | </span>
      <span class="inline hide-if-no-js">
        <a href="#" class="editinline" onclick="show_calendar_inline(<?php echo $row->id; ?>)" title="Edit This Calendar Inline">Quick&nbsp;Edit</a> | </span>
      <span class="trash">
        <a class="submitdelete" title="Delete This Calendar" href="javascript:confirmation('admin.php?page=SpiderCalendar&task=remove_calendar&id=<?php echo $row->id; ?>','<?php echo $row->title; ?>')">Delete</a></span>
    </div>
  </td>
  <td><a href="admin.php?page=SpiderCalendar&task=show_manage_event&calendar_id=<?php echo $row->id; ?>">Manage events</a></td>
  <td><a <?php if (!$row->published)
    echo 'style="color:#C00"'; ?>
    href="admin.php?page=SpiderCalendar&task=published&id=<?php echo $row->id; ?>"><?php if ($row->published)
    echo "Yes";
  else echo "No"; ?></a></td>
  <?php
    die();
  }
  else {
    die();
  }
}

function spider_calendar_quick_edit() {
  $current_user = wp_get_current_user();
  if ($current_user->roles[0] !== 'administrator') {
    echo 'You have no permission.';
    die();
  }
  global $wpdb;
  if (isset($_POST['calendar_id'])) {
    $row = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "spidercalendar_calendar WHERE id='%d'", $_POST['calendar_id']));
    ?>
  <td colspan="4" class="colspanchange">
    <fieldset class="inline-edit-col-left">
      <div style="float:left; width:100% " class="inline-edit-col">
        <h4>Quick Edit</h4>
        <label for="calendar_title"><span style="width:160px !important" class="title">Title: </span></label>
        <span class="input-text-wrap">
          <input type="text" style="width:150px !important" id="calendar_title" name="calendar_title" value="<?php echo $row->title; ?>" class="ptitle" value=""/>
        </span>
        <label for="def_year"><span class="title alignleft" style="width:160px !important">Default Year: </span></label>
        <span>
          <input type="text" name="def_year" id="def_year" style="width:150px;" value="<?php echo $row->def_year ?>"/>
        </span>
        <label for="def_month"><span class="title alignleft" style="width:160px !important">Default Month: </span></label>
        <span>
          <select id="def_month" name="def_month" style="width:150px;">
            <?php
            $month_array = array(
              '' => 'Current',
              '01' => 'January',
              '02' => 'February',
              '03' => 'March',
              '04' => 'April',
              '05' => 'May',
              '06' => 'June',
              '07' => 'July',
              '08' => 'August',
              '09' => 'September',
              '10' => 'October',
              '11' => 'November',
              '12' => 'December',
            );
            foreach ($month_array as $key => $def_month) {
              ?>
              <option <?php echo (($row->def_month == $key) ? 'selected="selected"' : '');?> value="<?php echo $key;?>"><?php echo $def_month;?></option>
              <?php
            }
            ?>
          </select>
        </span>
        <label for="time_format0"><span class="title alignleft" style="width:160px !important">Use 12 hours time format: </span></label>
        <span>
          <input style="margin-top:5px" type="radio" class="alignleft" name="time_format" id="time_format0" value="0" <?php if ($row->time_format == 0) echo 'checked="checked"'; ?> />
          <em style="margin:4px 5px 0 0" class="alignleft"> No </em>
          <input style="margin-top:5px" class="alignleft" type="radio" name="time_format" id="time_format1" value="1" <?php if ($row->time_format == 1) echo 'checked="checked"'; ?> />
          <em style="margin:4px 5px 0 0" class="alignleft"> Yes </em>
        </span>
      </div>
    </fieldset>
    <p class="submit inline-edit-save">
      <a accesskey="c" href="#" title="Cancel" onclick="cancel_qiucik_edit(<?php echo $row->id; ?>)" class="button-secondary cancel alignleft">Cancel</a>
      <input type="hidden" id="_inline_edit" name="_inline_edit" value="d8393e8662">
      <a accesskey="s" href="#" title="Update" onclick="updae_inline_sp_calendar(<?php echo  "'" . $row->id . "'" ?>)" class="button-primary save alignright">Update</a>
      <img id="imig_for_waiting" class="waiting" style="display:none;" src="http://localhost/wordpress/wp-admin/images/wpspin_light.gif" alt="">
      <input type="hidden" name="post_view" value="list">
      <input type="hidden" name="screen" value="edit-page">
      <span class="error" style="display:none"></span>
      <br class="clear">
    </p>
  </td>
  <?php
    die();
  }
  else {
    die();
  }
}

// Add editor new mce button.
add_filter('mce_external_plugins', "sp_calendar_register");
add_filter('mce_buttons', 'sp_calendar_add_button', 0);

// Function for add new button.
function sp_calendar_add_button($buttons) {
  array_push($buttons, "sp_calendar_mce");
  return $buttons;
}

// Function for registr new button.
function sp_calendar_register($plugin_array) {
  $url = plugins_url('js/editor_plugin.js', __FILE__);
  $plugin_array["sp_calendar_mce"] = $url;
  return $plugin_array;
}

// Function create in menu.
function sp_calendar_options_panel() {
  add_menu_page('Theme page title', 'Calendar', 'manage_options', 'SpiderCalendar', 'Manage_Spider_Calendar', plugins_url("images/calendar_menu.png", __FILE__));
  $page_calendar = add_submenu_page('SpiderCalendar', 'Calendars', 'Calendars', 'manage_options', 'SpiderCalendar', 'Manage_Spider_Calendar');
  $page_event_category = add_submenu_page('SpiderCalendar', 'Event Category', 'Event Category', 'manage_options', 'spider_calendar_event_category', 'Manage_Spider_Category_Calendar');
  $page_theme = add_submenu_page('SpiderCalendar', 'Calendar Parameters', 'Calendar Themes', 'manage_options', 'spider_calendar_themes', 'spider_calendar_params');
  $page_widget_theme = add_submenu_page('SpiderCalendar', 'Calendar Parameters', 'Widget Themes', 'manage_options', 'spider_widget_calendar_themes', 'spider_widget_calendar_params');
  $Featured_Plugins = add_submenu_page('SpiderCalendar', 'Featured Plugins', 'Featured Plugins', 'manage_options', 'calendar_Featured_Plugins', 'calendar_Featured_Plugins');
  $Featured_themes = add_submenu_page('SpiderCalendar', 'Featured Themes', 'Featured Themes', 'manage_options', 'calendar_Featured_themes', 'calendar_Featured_themes');
  add_submenu_page('SpiderCalendar', 'Export', 'Export', 'manage_options', 'calendar_export', 'calendar_export'); 
  add_submenu_page('SpiderCalendar', 'Licensing', 'Licensing', 'manage_options', 'Spider_calendar_Licensing', 'Spider_calendar_Licensing');
  add_submenu_page('SpiderCalendar', 'Uninstall  Spider Event Calendar', 'Uninstall  Spider Event Calendar', 'manage_options', 'Uninstall_sp_calendar', 'Uninstall_sp_calendar'); // uninstall Calendar
  add_action('admin_print_styles-' . $Featured_Plugins, 'calendar_Featured_Plugins_styles');
  add_action('admin_print_styles-' . $Featured_themes, 'calendar_Featured_themes_styles');
  add_action('admin_print_styles-' . $page_theme, 'spider_calendar_themes_admin_styles_scripts');
  add_action('admin_print_styles-' . $page_event_category, 'spider_calendar_event_category_admin_styles_scripts');
  add_action('admin_print_styles-' . $page_calendar, 'spider_calendar_admin_styles_scripts');
  add_action('admin_print_styles-' . $page_widget_theme, 'spider_widget_calendar_themes_admin_styles_scripts');
}

function Spider_calendar_Licensing() {
  ?>
  <div style="width:95%">
    <p>This plugin is the non-commercial version of the Spider Event Calendar. Use of the calendar is free.<br />
    The only limitation is the use of the themes. If you want to use one of the 11 standard themes or create a new one that
    satisfies the needs of your web site, you are required to purchase a license.<br />
    Purchasing a license will add 17 standard themes and give possibility to edit the themes of the Spider Event Calendar.
    </p>
    <br /><br />
    <a href="https://web-dorado.com/files/fromSpiderCalendarWP.php" class="button-primary" target="_blank">Purchase a License</a>
    <br /><br /><br />
    <p>After the purchasing the commercial version follow this steps:</p>
    <ol>
      <li>Deactivate Spider Event Calendar Plugin</li>
      <li>Delete Spider Event Calendar Plugin</li>
      <li>Install the downloaded commercial version of the plugin</li>
  </ol>
  </div>
  <?php
}

function spider_calendar_themes_admin_styles_scripts() {
  global $wd_spider_calendar_version;
  wp_enqueue_script("jquery");
  wp_enqueue_script("standart_themes", plugins_url('elements/theme_reset.js', __FILE__), array(), $wd_spider_calendar_version);
 wp_enqueue_script('wp-color-picker');
  wp_enqueue_style( 'wp-color-picker' );
  if (isset($_GET['task'])) {
    if ($_GET['task'] == 'edit_theme' || $_GET['task'] == 'add_theme' || $_GET['task'] == 'Apply') {
      wp_enqueue_style("parsetheme_css", plugins_url('style_for_cal/style_for_tables_cal.css', __FILE__), array(), $wd_spider_calendar_version);
    }
  }
}

function spider_widget_calendar_themes_admin_styles_scripts() {
  global $wd_spider_calendar_version;
  wp_enqueue_script("jquery");
  wp_enqueue_script("standart_themes", plugins_url('elements/theme_reset_widget.js', __FILE__), array(), $wd_spider_calendar_version);
    wp_enqueue_script('wp-color-picker');
  wp_enqueue_style( 'wp-color-picker' );
  if (isset($_GET['task'])) {
    if ($_GET['task'] == 'edit_theme' || $_GET['task'] == 'add_theme' || $_GET['task'] == 'Apply') {
      wp_enqueue_style("parsetheme_css", plugins_url('style_for_cal/style_for_tables_cal.css', __FILE__), array(), $wd_spider_calendar_version);
    }
  }
}

function spider_calendar_admin_styles_scripts() {
  global $wd_spider_calendar_version;
  wp_enqueue_script("Calendar", plugins_url("elements/calendar.js", __FILE__), array(), $wd_spider_calendar_version, FALSE);
  wp_enqueue_script("calendar-setup", plugins_url("elements/calendar-setup.js", __FILE__), array(), $wd_spider_calendar_version, FALSE);
  wp_enqueue_script("calendar_function", plugins_url("elements/calendar_function.js", __FILE__), array(), $wd_spider_calendar_version, FALSE);
  wp_enqueue_style("Css", plugins_url("elements/calendar-jos.css", __FILE__), array(), $wd_spider_calendar_version, FALSE);
}

function spider_calendar_event_category_admin_styles_scripts(){
  global $wd_spider_calendar_version;
  wp_enqueue_script("Calendar", plugins_url("elements/calendar.js", __FILE__), array(), $wd_spider_calendar_version, FALSE);
  wp_enqueue_script("calendar-setup", plugins_url("elements/calendar-setup.js", __FILE__), array(), $wd_spider_calendar_version, FALSE);
    wp_enqueue_script('wp-color-picker');
  wp_enqueue_style( 'wp-color-picker' );
  wp_enqueue_style("Css", plugins_url("elements/calendar-jos.css", __FILE__), array(), $wd_spider_calendar_version, FALSE);
  }

add_filter('admin_head', 'spide_ShowTinyMCE');
function spide_ShowTinyMCE() {
  // conditions here
  wp_enqueue_script('common');
  wp_enqueue_script('jquery-color');
  wp_print_scripts('editor');
  if (function_exists('add_thickbox')) {
    add_thickbox();
  }
  wp_print_scripts('media-upload');
  if(version_compare(get_bloginfo('version'),3.3)<0){
  if (function_exists('wp_tiny_mce')) {
    wp_tiny_mce();
  }
  }
  wp_admin_css();
  wp_enqueue_script('utils');
  do_action("admin_print_styles-post-php");
  do_action('admin_print_styles');
}

// Add menu.
add_action('admin_menu', 'sp_calendar_options_panel');

require_once("functions_for_xml_and_ajax.php");
require_once("front_end/bigcalendarday.php");
require_once("front_end/bigcalendarlist.php");
require_once("front_end/bigcalendarweek.php");
require_once("front_end/bigcalendarmonth.php");
require_once("front_end/bigcalendarmonth_widget.php");
require_once("front_end/bigcalendarweek_widget.php");
require_once("front_end/bigcalendarlist_widget.php");
require_once("front_end/bigcalendarday_widget.php");

// Actions for popup and xmls.
add_action('wp_ajax_spiderbigcalendar_day', 'big_calendar_day');
add_action('wp_ajax_spiderbigcalendar_list', 'big_calendar_list');
add_action('wp_ajax_spiderbigcalendar_week', 'big_calendar_week');
add_action('wp_ajax_spiderbigcalendar_month', 'big_calendar_month');
add_action('wp_ajax_spiderbigcalendar_month_widget', 'big_calendar_month_widget');
add_action('wp_ajax_spiderbigcalendar_list_widget', 'big_calendar_list_widget');
add_action('wp_ajax_spiderbigcalendar_week_widget', 'big_calendar_week_widget');
add_action('wp_ajax_spiderbigcalendar_day_widget', 'big_calendar_day_widget');
add_action('wp_ajax_spidercalendarbig', 'spiderbigcalendar');
add_action('wp_ajax_spiderseemore', 'seemore');
add_action('wp_ajax_window', 'php_window');
// Ajax for users.
add_action('wp_ajax_nopriv_spiderbigcalendar_day', 'big_calendar_day');
add_action('wp_ajax_nopriv_spiderbigcalendar_list', 'big_calendar_list');
add_action('wp_ajax_nopriv_spiderbigcalendar_week', 'big_calendar_week');
add_action('wp_ajax_nopriv_spiderbigcalendar_month', 'big_calendar_month');
add_action('wp_ajax_nopriv_spiderbigcalendar_month_widget', 'big_calendar_month_widget');
add_action('wp_ajax_nopriv_spiderbigcalendar_list_widget', 'big_calendar_list_widget');
add_action('wp_ajax_nopriv_spiderbigcalendar_week_widget', 'big_calendar_week_widget');
add_action('wp_ajax_nopriv_spiderbigcalendar_day_widget', 'big_calendar_day_widget');
add_action('wp_ajax_nopriv_spidercalendarbig', 'spiderbigcalendar');
add_action('wp_ajax_nopriv_spiderseemore', 'seemore');
add_action('wp_ajax_nopriv_window', 'php_window');
// Add style head.
function add_button_style_calendar() {
  echo '<script>var wdplugin_url = "' . plugins_url('', __FILE__) . '";</script>';
}
add_action('admin_head', 'add_button_style_calendar');

function Manage_Spider_Calendar() {
  global $wpdb;
  if (!function_exists('print_html_nav')) {
    require_once("nav_function/nav_html_func.php");
  }
  require_once("calendar_functions.php"); // add functions for Spider_Video_Player
  require_once("calendar_functions.html.php"); // add functions for vive Spider_Video_Player
  if (isset($_GET["task"])) {
    $task = esc_html($_GET["task"]);
  }
  else {
    $task = "";
  }
  if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
  }
  else {
    $id = 0;
  }
  if (isset($_GET["calendar_id"])) {
    $calendar_id = (int) $_GET["calendar_id"];
  }
  else {
    $calendar_id = 0;
  }
  switch ($task) {
    case 'calendar':
      show_spider_calendar();
      break;
    case 'add_calendar':
      add_spider_calendar();
      break;
    case 'published';
	  $nonce_sp_cal = $_REQUEST['_wpnonce'];
	  if (! wp_verify_nonce($nonce_sp_cal, 'nonce_sp_cal') )
   	    die("Are you sure you want to do this?");
      spider_calendar_published($id);
      show_spider_calendar();
      break;
    case 'Save':
      if (!$id) {
	    check_admin_referer('nonce_sp_cal', 'nonce_sp_cal');
        apply_spider_calendar(-1);
      }
      else {
	    check_admin_referer('nonce_sp_cal', 'nonce_sp_cal');
        apply_spider_calendar($id);
      }
      show_spider_calendar();
      break;
    case 'Apply':
      if (!$id) {
	    check_admin_referer('nonce_sp_cal', 'nonce_sp_cal');
        apply_spider_calendar(-1);
        $id = $wpdb->get_var("SELECT MAX(id) FROM " . $wpdb->prefix . "spidercalendar_calendar");
      }
      else {
	    check_admin_referer('nonce_sp_cal', 'nonce_sp_cal');
        apply_spider_calendar($id);
      }
      edit_spider_calendar($id);
      break;
    case 'edit_calendar':
      edit_spider_calendar($id);
      break;
    case 'remove_calendar':
	  check_admin_referer('nonce_sp_cal', 'nonce_sp_cal');
      remove_spider_calendar($id);
      show_spider_calendar();
      break;
    // Events.
    case 'show_manage_event':
      show_spider_event($calendar_id);
      break;
    case 'add_event':
      add_spider_event($calendar_id);
      break;
    case 'save_event':
      if ($id) {
	    check_admin_referer('nonce_sp_cal', 'nonce_sp_cal');
        apply_spider_event($calendar_id, $id);
      }
      else {
	    check_admin_referer('nonce_sp_cal', 'nonce_sp_cal');
        apply_spider_event($calendar_id, -1);
      }
      show_spider_event($calendar_id);
      break;
    case 'apply_event':
      if ($id) {
	    check_admin_referer('nonce_sp_cal', 'nonce_sp_cal');
        apply_spider_event($calendar_id, $id);
      }
      else {
	    check_admin_referer('nonce_sp_cal', 'nonce_sp_cal');
        apply_spider_event($calendar_id, -1);
        $id = $wpdb->get_var("SELECT MAX(id) FROM " . $wpdb->prefix . "spidercalendar_event");
      }
      edit_spider_event($calendar_id, $id);
      break;
    case 'edit_event':
      edit_spider_event($calendar_id, $id);
      break;
    case 'remove_event':
	  $nonce_sp_cal = $_REQUEST['_wpnonce'];
	  if (! wp_verify_nonce($nonce_sp_cal, 'nonce_sp_cal') ) 
	    die("Are you sure you want to do this?");
      remove_spider_event($calendar_id, $id);
      show_spider_event($calendar_id);
      break;
    case 'published_event';
	  $nonce_sp_cal = $_REQUEST['_wpnonce'];
	  if (! wp_verify_nonce($nonce_sp_cal, 'nonce_sp_cal') )
   	    die("Are you sure you want to do this?");
      published_spider_event($calendar_id, $id);
      show_spider_event($calendar_id);
      break;
    default:
      show_spider_calendar();
      break;
  }
}

function Manage_Spider_Category_Calendar(){
	require_once("calendar_functions.html.php");
	require_once("calendar_functions.php");
if (!function_exists('print_html_nav')) {
    require_once("nav_function/nav_html_func.php");
  }

global $wpdb;
  if (isset($_GET["task"])) {
    $task = esc_html($_GET["task"]);
  }
  else {
    $task = "";
	show_event_cat();
	return;
  }
  if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
  }
  else {
    $id = 0;
  }

switch($task){
	case 'add_category':
		edit_event_category($id);
	break;

	case 'save_category_event':
	if(!$id){
	    check_admin_referer('nonce_sp_cal', 'nonce_sp_cal');
		save_spider_category_event();
		$id = $wpdb->get_var("SELECT MAX(id) FROM " . $wpdb->prefix . "spidercalendar_event_category");
		}
		else
		{
		check_admin_referer('nonce_sp_cal', 'nonce_sp_cal');
		apply_spider_category_event($id);
		}
		show_event_cat();
		break;
		
	case 'apply_event_category':
	 if (!$id) {
	    check_admin_referer('nonce_sp_cal', 'nonce_sp_cal');
        save_spider_category_event();
        $id = $wpdb->get_var("SELECT MAX(id) FROM " . $wpdb->prefix . "spidercalendar_event_category");
      }
      else {
	    check_admin_referer('nonce_sp_cal', 'nonce_sp_cal');
        apply_spider_category_event($id);
      }
      edit_event_category($id);
		break;
		
	case 'edit_event_category':
		//apply_spider_category_event();
		edit_event_category($id);
		break;
		
	case 'remove_event_category':	
		check_admin_referer('nonce_sp_cal', 'nonce_sp_cal');
		remove_category_event($id);
		show_event_cat();
		break;
	case 'published':
		$nonce_sp_cal = $_REQUEST['_wpnonce'];
		if (! wp_verify_nonce($nonce_sp_cal, 'nonce_sp_cal') )
	      die("Are you sure you want to do this?");
		spider_category_published($id);
		show_event_cat();
		break;
	  }

}

function upcoming_widget(){
	require_once("calendar_functions.html.php");
	require_once("spidercalendar_upcoming_events_widget.php");
	require_once("calendar_functions.php");
	if (!function_exists('print_html_nav')) {
    require_once("nav_function/nav_html_func.php");
  }
 
	  global $wpdb;
 
  spider_upcoming();
}

function spider_widget_calendar_params() {
  wp_enqueue_script('media-upload');
  wp_admin_css('thickbox');
  if (!function_exists('print_html_nav')) {
    require_once("nav_function/nav_html_func.php");
  }
  require_once("widget_Themes_function.html.php");
  global $wpdb;
  if (isset($_GET["task"])) {
    $task = esc_html($_GET["task"]);
  }
  else {
    $task = "";
  }
  switch ($task) {
    case 'theme':
      html_show_theme_calendar_widget();
      break;
    default:
      html_show_theme_calendar_widget();
  }
}

// Themes.
function spider_calendar_params() {
  wp_enqueue_script('media-upload');
  wp_admin_css('thickbox');
  if (!function_exists('print_html_nav')) {
    require_once("nav_function/nav_html_func.php");
  }
  require_once("Themes_function.html.php"); // add functions for vive Spider_Video_Player
  global $wpdb;
  if (isset($_GET["task"])) {
    $task = esc_html($_GET["task"]);
  }
  else {
    $task = "";
  }
  switch ($task) {
    case 'theme':
      html_show_theme_calendar();
      break;
    default:
      html_show_theme_calendar();
  }
}


function Uninstall_sp_calendar() {
  global $wpdb;
  $base_name = plugin_basename('Spider_Calendar');
  $base_page = 'admin.php?page=' . $base_name;
  $mode = (isset($_GET['mode']) ? trim($_GET['mode']) : '');

  if (!empty($_POST['do'])) {
    if ($_POST['do'] == "UNINSTALL Spider Event Calendar") {
      check_admin_referer('Spider_Calendar uninstall');
      
        echo '<form id="message" class="updated fade">';
        echo '<p>';
        echo "Table '" . $wpdb->prefix . "spidercalendar_event' has been deleted.";
		$wpdb->query("DROP TABLE " . $wpdb->prefix . "spidercalendar_event");
        echo '<font style="color:#000;">';
        echo '</font><br />';
        echo '</p>';
		echo '<p>';
        echo "Table '" . $wpdb->prefix . "spidercalendar_event_category' has been deleted.";
		$wpdb->query("DROP TABLE " . $wpdb->prefix . "spidercalendar_event_category");
        echo '<font style="color:#000;">';
        echo '</font><br />';
        echo '</p>';		
        echo '<p>';
        echo "Table '" . $wpdb->prefix . "spidercalendar_calendar' has been deleted.";
		$wpdb->query("DROP TABLE " . $wpdb->prefix . "spidercalendar_calendar");
        echo '<font style="color:#000;">';
        echo '</font><br />';
        echo '</p>';
		 echo '<p>';
        echo "Table '" . $wpdb->prefix . "spidercalendar_theme' has been deleted.";
		$wpdb->query("DROP TABLE " . $wpdb->prefix . "spidercalendar_theme");
        echo '<font style="color:#000;">';
        echo '</font><br />';
        echo '</p>';
        echo '<p>';
        echo "Table '" . $wpdb->prefix . "spidercalendar_widget_theme' has been deleted.";
        $wpdb->query("DROP TABLE " . $wpdb->prefix . "spidercalendar_widget_theme");
        echo '<font style="color:#000;">';
        echo '</font><br />';
        echo '</p>';
        echo '</form>';
        $mode = 'end-UNINSTALL';
      
    }
  }
  switch ($mode) {
    case 'end-UNINSTALL':
      $deactivate_url = wp_nonce_url('plugins.php?action=deactivate&amp;plugin=' . plugin_basename(__FILE__), 'deactivate-plugin_' . plugin_basename(__FILE__));
      echo '<div class="wrap">';
      echo '<h2>Uninstall Spider Event Calendar</h2>';
      echo '<p><strong>' . sprintf('<a href="%s">Click Here</a> To Finish The Uninstallation And Spider Event Calendar Will Be Deactivated Automatically.', $deactivate_url) . '</strong></p>';
      echo '</div>';
      break;
    // Main Page
    default:
      ?>
      <form method="post" id="uninstall_form"  action="<?php echo admin_url('admin.php?page=Uninstall_sp_calendar'); ?>">
        <?php wp_nonce_field('Spider_Calendar uninstall'); ?>
        <div class="wrap">
          <div id="icon-Spider_Calendar" class="icon32"><br/></div>
          <h2><?php echo 'Uninstall Spider Event Calendar'; ?></h2>

          <p>
            <?php echo 'Deactivating Spider Event Calendar plugin does not remove any data that may have been created. To completely remove this plugin, you can uninstall it here.'; ?>
          </p>

          <p style="color: red">
            <strong><?php echo'WARNING:'; ?></strong><br/>
            <?php echo 'Once uninstalled, this cannot be undone. You should use a Database Backup plugin of WordPress to back up all the data first.'; ?>
          </p>

          <p style="color: red">
            <strong><?php echo 'The following WordPress Options/Tables will be DELETED:'; ?></strong><br/>
          </p>
          <table class="widefat">
            <thead>
            <tr>
              <th><?php echo 'WordPress Tables'; ?></th>
            </tr>
            </thead>

            <tr>
              <td valign="top">
                <ol>
                  <?php
                  echo '<li>' . $wpdb->prefix . 'spidercalendar_event</li>' . "\n";
				  echo '<li>' . $wpdb->prefix . 'spidercalendar_event_category</li>' . "\n";
                  echo '<li>' . $wpdb->prefix . 'spidercalendar_calendar</li>' . "\n";
				  echo '<li>' . $wpdb->prefix . 'spidercalendar_theme</li>' . "\n";
                  echo '<li>' . $wpdb->prefix . 'spidercalendar_widget_theme</li>' . "\n";
                  ?>
                </ol>
              </td>
            </tr>
          </table>
		  <script>
		  function uninstall(){
		  jQuery(document).ready(function() {
				  if(jQuery('#uninstall_yes').is(':checked')){
					var answer = confirm('<?php echo 'You Are About To Uninstall Spider Event Calendar From WordPress.\nThis Action Is Not Reversible.\n\n Choose [Cancel] To Stop, [OK] To Uninstall.'; ?>');
				
					if(answer)
						jQuery("#uninstall_form").submit();
					}
				  else
					alert('To uninstall please check the box above.');

			  });
		  }
		  </script>
          <p style="text-align: center;">
              <?php echo 'Do you really want to uninstall Spider Event Calendar?'; ?><br/><br/>
            <input type="checkbox" value="yes" id="uninstall_yes" />&nbsp;<?php echo 'Yes'; ?><br/><br/>
			  <input type="hidden" name="do" value="UNINSTALL Spider Event Calendar" />
            <input type="button" name="DODO" value="<?php echo 'UNINSTALL Spider Event Calendar'; ?>"
                   class="button-primary"
                   onclick="uninstall()"/>
          </p>
        </div>
      </form>
      <?php
  }
}

function calendar_Featured_themes_styles() { 
  global $wd_spider_calendar_version;
  wp_enqueue_style("Featured_themes", plugins_url("featured_themes.css", __FILE__), array(), $wd_spider_calendar_version);
}

function calendar_Featured_themes() { ?>
<div id="main_featured_themes_page">
	<table align="center" width="90%" style="margin-top: 0px;border-bottom: rgb(111, 111, 111) solid 1px;">
		<tr>
			<td colspan="2" style="height: 40px; padding: 30px 0px 0px 0px;">
				<h3 style="margin: 0px;font-family:Segoe UI;padding-bottom: 15px;color: rgb(111, 111, 111); font-size:18pt;">Featured Themes</h3>
			</td>
			<td align="right" style="font-size:16px;"></td>
		</tr>
	</table>
	<form method="post">
		<ul id="featured-plugins-list">
			<li class="business_elite">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Business Elite Theme</strong>
				</div>
				<div class="description">
					<p>Business Elite is a robust parallax theme for business websites. The theme uses smooth transitions and many functional sections.</p>
				</div>
				<a target="_blank" href="https://web-dorado.com/wordpress-themes/business-elite.html" class="download">Download plugin >></a>
			</li>
			<li class="sauron">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Sauron Theme</strong>
				</div>
				<div class="description">
					 <p>Sauron is a multipurpose parallax theme, which uses multiple interactive sections designed for the client-engagement.</p>		
				</div>
				<a target="_blank" href="https://web-dorado.com/wordpress-themes/sauron.html" class="download">Download</a>
			</li>
			<li class="mottomag">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">MottoMag Theme</strong>
				</div>
				<div class="description">
					<p>MottoMag is a vibrant, responsive theme which is a perfect choice for the combination of textual content with videos and images.</p>	
				</div>
				<a target="_blank" href="https://web-dorado.com/wordpress-themes/mottomag.html" class="download">Download</a>
			</li>
			<li class="business_world">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Business World Theme</strong>
				</div>
				<div class="description">
					<p>Business World is an innovative WordPress theme great for Business websites.</p>		 
				</div>
				<a target="_blank" href="https://web-dorado.com/wordpress-themes/business-world.html" class="download">Download</a>
			</li>
			<li class="best_magazine">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Best Magazine Theme</strong>
				</div>
				<div class="description">
					<p>Best Magazine is an ultimate selection when you are dealing with multi-category news websites.</p>
				</div>
				<a target="_blank" href="https://web-dorado.com/wordpress-themes/best-magazine.html" class="download">Download</a>
			</li>
			<li class="wedding_style">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Wedding Style Theme</strong>
				</div>
				<div class="description">
					<p>Wedding style is a responsive theme designed for the organization and maintenance of wedding websites and blogs.</p>
				</div>
				<a target="_blank" href="https://web-dorado.com/wordpress-themes/wedding-style.html" class="download">Download</a>
			</li>
			<li class="magazine">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Magazine Theme</strong>
				</div>
				<div class="description">
					<p>Magazine theme is a perfect solution when creating news and informational websites. It comes with a wide range of layout options.</p>	
				</div>
				<a target="_blank" href="https://web-dorado.com/wordpress-themes/news-magazine.html" class="download">Download</a>
			</li>
			<li class="weddings">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Weddings Theme</strong>
				</div>
				<div class="description">
					<p>Weddings is an elegant, responsive WordPress theme designed for wedding websites. The theme includes multiple pages, homepage slider and gallery support.</p>
				</div>
				<a target="_blank" href="https://web-dorado.com/wordpress-themes/wedding.html" class="download">Download</a>
			</li>
			<li class="exclusive">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Exclusive Theme</strong>
				</div>
				<div class="description">
					<p>Exclusive is a unique theme designed to best fit business style websites. It comes with a large list of customizable features.</p>
				</div>
				<a target="_blank" href="https://web-dorado.com/wordpress-themes/exclusive.html" class="download">Download</a>
			</li>
			<li class="expert">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Expert Theme</strong>
				</div>
				<div class="description">
					<p>WordPress Expert is a modern, user-friendly and stylish theme. It has a list of customizable layout, style, colors and fonts.</p>
				</div>
				<a target="_blank" href="https://web-dorado.com/wordpress-themes/business-responsive.html" class="download">Download</a>
			</li>
		</ul>
	</form>
</div >	
<?php }

function calendar_Featured_Plugins_styles() {
  global $wd_spider_calendar_version;
  wp_enqueue_style("Featured_Plugins", plugins_url("featured_plugins.css", __FILE__), array(), $wd_spider_calendar_version);
}
function calendar_Featured_Plugins() {  ?>
<div id="main_featured_plugins_page">
	<table align="center" width="90%" style="margin-top: 0px;border-bottom: rgb(111, 111, 111) solid 1px;">
		<tr>
			<td colspan="2" style="height: 40px; padding: 30px 0px 0px 0px;">
				<h3 style="margin: 0px;font-family:Segoe UI;padding-bottom: 15px;color: rgb(111, 111, 111); font-size:18pt;">Featured Plugins</h3>
			</td>
			<td  align="right" style="font-size:16px;"></td>
		</tr>
	</table>
	<form method="post">
		<ul id="featured-plugins-list">
			<li class="photo-gallery ">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Photo Gallery</strong>
				</div>
				<div class="description">
					<p>Photo Gallery is a fully responsive WordPress Gallery plugin with advanced functionality. </p>
				</div>
				<a target="_blank" href="https://web-dorado.com/products/wordpress-photo-gallery-plugin.html" class="download">Download</a>
			</li>
			<li class="form-maker">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Form Maker</strong>
				</div>
				<div class="description">
					<p>Form Maker is a modern and advanced tool for creating WordPress forms easily and fast.</p>
				</div>
				<a target="_blank" href="https://web-dorado.com/products/wordpress-form.html" class="download">Download</a>
			</li>
			<li class="events-wd">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Event Calendar WD</strong>
				</div>
				<div class="description">
					<p>Organize and publish your events in an easy and elegant way using Event Calendar WD.</p>
				</div>
				<a target="_blank" href="https://web-dorado.com/products/wordpress-event-calendar-wd.html" class="download">Download</a>
			</li>
			 <li class="catalog">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Spider Catalog</strong>
				</div>
				<div class="description">
					<p>Spider Catalog for WordPress is a convenient tool for organizing the products represented on your website into catalogs.</p>	
				</div>
				<a target="_blank" href="https://web-dorado.com/products/wordpress-catalog.html" class="download">Download</a>
			</li>
			<li class="slider_wd">
				 <div class="product"></div>
				 <div class="title">
					 <strong class="heading">Slider WD</strong>
				 </div>
				<div class="description">
					<p>Create responsive, highly configurable sliders with various effects for your WordPress site. </p>			
				</div>
				<a target="_blank" href="https://web-dorado.com/products/wordpress-slider-plugin.html" class="download">Download</a>
			</li>
			<li class="player">
				<div class="product"></div>
				<div class="title">
						<strong class="heading">Video Player</strong>
				</div>
				<div class="description">
					<p>Spider Video Player for WordPress is a Flash & HTML5 video player plugin that allows you to easily add videos to your website with the possibility</p>
				</div>
				<a target="_blank" href="https://web-dorado.com/products/wordpress-player.html" class="download">Download</a>
			</li>
			<li class="contacts">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Spider Contacts</strong>
				</div>
				<div class="description">
					<p>Spider Contacts helps you to display information about the group of people more intelligible, effective and convenient.</p>	
				</div>
				<a target="_blank" href="https://web-dorado.com/products/wordpress-contacts-plugin.html" class="download">Download</a>
			</li>
			<li class="facebook">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Spider Facebook</strong>
				</div>
				<div class="description">
					<p>Spider Facebook is a WordPress integration tool for Facebook.It includes all the available Facebook social plugins and widgets.</p>
				</div>
				<a target="_blank" href="https://web-dorado.com/products/wordpress-facebook.html" class="download">Download</a>
			</li>
			<li class="faq">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Spider FAQ</strong>
				</div>
				<div class="description">
					<p>The Spider FAQ WordPress plugin is for creating an FAQ (Frequently Asked Questions) section for your website.</p>	
				</div>
				<a target="_blank" href="https://web-dorado.com/products/wordpress-faq-plugin.html" class="download">Download</a>
			</li>
			<li class="zoom">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Zoom</strong>
				</div>
				<div class="description">
					<p>Zoom enables site users to resize the predefined areas of the web site.</p>	
				</div>
				<a target="_blank" href="https://web-dorado.com/products/wordpress-zoom.html" class="download">Download</a>
			</li>
			<li class="flash-calendar">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Flash Calendar</strong>
				</div>
				<div class="description">
					<p>Spider Flash Calendar is a highly configurable Flash calendar plugin which allows you to have multiple organized events.</p>	
				</div>
				<a target="_blank" href="https://web-dorado.com/products/wordpress-events-calendar.html" class="download">Download</a>
			</li>
			<li class="contact-maker">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Contact Form Maker</strong>
				</div>
				<div class="description">
					<p>WordPress Contact Form Maker is an advanced and easy-to-use tool for creating forms.</p>			 
				 </div>
				 <a target="_blank" href="https://web-dorado.com/products/wordpress-contact-form-maker-plugin.html" class="download">Download</a>
			</li>
			<li class="twitter-widget">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Widget Twitter</strong>
				</div>
				<div class="description">
					<p>The Widget Twitter plugin lets you to fully integrate your WordPress site with your Twitter account.</p>
				</div>
				<a target="_blank" href="https://web-dorado.com/products/wordpress-twitter-integration-plugin.html" class="download">Download</a>
			</li>
			<li class="contact_form_bulder">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Contact Form Builder</strong>
				</div>
				<div class="description">
					<p>Contact Form Builder is the best tool for quickly arranging a contact form for your clients and visitors. </p>		 
				</div>
				<a target="_blank" href="https://web-dorado.com/products/wordpress-contact-form-builder.html" class="download">Download</a>
			</li>
			<li class="folder_menu">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Folder Menu</strong>
				</div>
				<div class="description">
					<p>Folder Menu Vertical is a WordPress Flash menu module for your website, designed to meet your needs and preferences. </p>		 
				</div>
				<a target="_blank" href="https://web-dorado.com/products/wordpress-menu-vertical.html" class="download">Download</a>
			</li>
			<li class="random_post">
				<div class="product"></div>
				<div class="title">
					<strong class="heading">Random post</strong>
				</div>
				<div class="description">
					<p>Spider Random Post is a small but very smart solution for your WordPress web site. </p>		 
			 </div>
			 <a target="_blank" href="https://web-dorado.com/products/wordpress-random-post.html" class="download">Download</a>
			</li>
		</ul>
	</form>
</div>
<?php }

add_action('init', 'spider_calendar_export');
function spider_calendar_export() {
     if (isset($_POST['export_spider_calendar']) && $_POST['export_spider_calendar'] == 'Export') {
        global $wpdb;
        $tmp_folder = get_temp_dir();        
        $select_spider_categories = "SELECT * from " . $wpdb->prefix . "spidercalendar_event_category";
        $spider_cats = $wpdb->get_results($select_spider_categories);
        $cat_columns = array(
            array('id', 'title', 'published', 'color', 'description')
        );
        if ($spider_cats) {
            foreach ($spider_cats as $cat) {
                $cat_columns[] = array(
                    $cat->id,
                    $cat->title,
                    $cat->published,
                    $cat->color,
                    $cat->description
                );
            }
        }
        $cat_handle = fopen($tmp_folder . '/sc_categories.csv', 'w+');
        foreach ($cat_columns as $ar) {
            if (fputcsv($cat_handle, $ar, ',') === FALSE) {
                break;
            }
        }
        @fclose($cat_handle);        
        $select_spider_calendars = "SELECT * from " . $wpdb->prefix . "spidercalendar_calendar";
        $spider_calendars = $wpdb->get_results($select_spider_calendars);
        $cal_columns = array(
            array('id', 'title', 'published')
        );
        if ($spider_calendars) {
            foreach ($spider_calendars as $cal) {
                $cal_columns[] = array(
                    $cal->id,
                    $cal->title,
                    $cal->published
                );
            }
        }
        $cal_handle = fopen($tmp_folder . '/sc_calendars.csv', 'w+');
        foreach ($cal_columns as $ar) {
            if (fputcsv($cal_handle, $ar, ',') === FALSE) {
                break;
            }
        }
        @fclose($cal_handle);        
        $select_spider_events = "SELECT * from " . $wpdb->prefix . "spidercalendar_event";
        $spider_events = $wpdb->get_results($select_spider_events);
        $events_columns = array(
            array('id', 'cal_id', 'start_date', 'end_date', 'title', 'cat_id',
                'time', 'text_for_date', 'userID', 'repeat_method', 'repeat', 'week',
                'month', 'month_type', 'monthly_list', 'month_week', 'year_month', 'published')
        );
        if ($spider_events) {
            foreach ($spider_events as $ev) {
                $events_columns[] = array(
                    $ev->id,
                    $ev->calendar,
                    $ev->date,
                    $ev->date_end,
                    $ev->title,
                    $ev->category,
                    $ev->time,
                    $ev->text_for_date,
                    $ev->userID,
                    $ev->repeat_method,
                    $ev->repeat,
                    $ev->week,
                    $ev->month,
                    $ev->month_type,
                    $ev->monthly_list,
                    $ev->month_week,
                    $ev->year_month,
                    $ev->published
                );
            }
        }
        $ev_handle = fopen($tmp_folder . '/sc_events.csv', 'w+');
        foreach ($events_columns as $ar) {
            if (fputcsv($ev_handle, $ar, ',') === FALSE) {
                break;
            }
        }
        @fclose($ev_handle);
        $files = array(
            'sc_categories.csv',
            'sc_calendars.csv',
            'sc_events.csv'
        );
        $zip = new ZipArchive();
        $tmp_file = tempnam('.', '');
        if ($zip->open($tmp_file, ZIPARCHIVE::CREATE) === TRUE) {
            foreach ($files as $file) {
                if (file_exists($tmp_folder . $file)) {
                    $zip->addFile($tmp_folder . $file, $file);
                }
            }
            $zip->close();
            header("Content-type: application/zip; charset=utf-8");
            header("Content-Disposition: attachment; filename=spider-event-calendar-export.zip");
            header("Content-length: " . filesize($tmp_file));
            header("Pragma: no-cache");
            header("Expires: 0");
            readfile($tmp_file);
        }
        foreach ($files as $file) {
            @unlink($tmp_folder . $file);
        }
    }
}

function calendar_export() {
    ?>
    <form method="post" style="font-size: 14px; font-weight: bold;">
		<div id="export_div">
          This section will allow exporting Spider Calendar data (events, calendars, categories) for further import to Event Calendar WD.
          <a href="https://web-dorado.com/products/wordpress-event-calendar-wd.html" target="_blank" style="color:blue; text-decoration:none;">More...</a>
		</div>
        <input type='submit' value='Export' id="export_WD" name='export_spider_calendar' />
    </form>
	<style>
	#export_div{
		background: #fff;
		border: 1px solid #e5e5e5;
		-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.04);
		box-shadow: 0 1px 1px rgba(0,0,0,.04);
		border-spacing: 0;
		width: 65%;
		clear: both;
		margin: 0;
		padding: 7px 7px 8px 10px;
		margin: 20px 0 10px 0;
	}

	#export_WD{
		font-size: 13px;
		padding: 7px 25px;
	}
	</style>
    <?php
}

// Activate plugin.
function SpiderCalendar_activate() {
  global $wpdb;
  $spider_event_table = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "spidercalendar_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar` int(11) NOT NULL,
  `date` date NOT NULL,
  `date_end` date NOT NULL,
  `title` text NOT NULL,
  `time` varchar(20) NOT NULL,
  `text_for_date` longtext NOT NULL,
  `userID` varchar(255) NOT NULL,
  `repeat_method` varchar(255) NOT NULL,
  `repeat` varchar(255) NOT NULL,
  `week` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `month_type` varchar(255) NOT NULL,
  `monthly_list` varchar(255) NOT NULL,
  `month_week` varchar(255) NOT NULL,
  `year_month` varchar(255) NOT NULL,
  `published` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
  $spider_calendar_table = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "spidercalendar_calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `gid` varchar(255) NOT NULL,
  `time_format` tinyint(1) NOT NULL,
  `allow_publish` varchar(255) NOT NULL,
  `start_month` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
$spider_category_event_table = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "spidercalendar_event_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `color` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
  $wpdb->query($spider_event_table);
  $wpdb->query($spider_calendar_table);
  $wpdb->query($spider_category_event_table);
  require_once "spider_calendar_update.php";
  spider_calendar_chech_update();
}
register_activation_hook(__FILE__, 'SpiderCalendar_activate');

function spider_calendar_ajax_func() {
  ?>
  <script>
    var spider_calendar_ajax = '<?php echo admin_url("admin-ajax.php"); ?>';
  </script>
  <?php
}
add_action('admin_head', 'spider_calendar_ajax_func');
?>