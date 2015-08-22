(function( $ ) {

	$('#event-list-cal-event-date').datepicker({
		dateFormat: 'yy-mm-dd',
	});
	$('#event-list-cal-event-end').datepicker({
		dateFormat: 'yy-mm-dd',
		minDate: $('#event-list-cal-event-date').attr('value')
	});
	$('#event-list-cal-event-date').change(function() {
		$('#event-list-cal-event-end').datepicker('option', 'minDate', $(this).attr('value'));
	});
	if($('#event-list-cal-event-days').attr('value') > 1) {
		$('#event-list-cal-event-repeat').attr('disabled', 'disabled');
	}
	$('#event-list-cal-event-days').change(function() {
		if($(this).attr('value') > 1) {
			$('#event-list-cal-event-repeat').attr('checked', false);
			$('#event-list-cal-event-repeat').attr('disabled', 'disabled');
		} else {
			$('#event-list-cal-event-repeat').removeAttr('disabled');
		}
	});
	$('#event-list-cal-event-days').keyup(function() {
		if($(this).attr('value') > 1) {
			$('#event-list-cal-event-repeat').attr('checked', false);
			$('#event-list-cal-event-days').attr('disabled', 'disabled');
		} else {
			$('#event-list-cal-event-days').removeAttr('disabled');
		}
	});
	$('#repeat-schedule').hide();
	$('event-list-cal-event-repeat-end-date-div').hide();
	if($('#event-list-cal-event-repeat').attr("checked") == "checked") {
		$('#repeat-schedule').show();
		$('#event-list-cal-repeat-end-div').show();
		$('#event-list-cal-event-days').attr('disabled', 'disabled');
	}
	$('#event-list-cal-event-repeat').change(function() {
		if($(this).attr("checked") == "checked") {
			$('#repeat-schedule').show();
			$('#event-list-cal-repeat-end-div').show();
			$('#event-list-cal-event-days').attr('disabled', 'disabled');
		} else {
			$('#repeat-schedule').hide();
			$('#event-list-cal-repeat-end-div').hide();
			$('#event-list-cal-event-days').removeAttr('disabled');
		}
	});
	if($('#event-list-cal-event-end-checkbox').attr('checked') != "checked") {
		$('event-list-cal-event-repeat-end-date-div').show();
	}
	$('#event-list-cal-event-end-checkbox').change(function() {
		if($(this).attr('checked') == 'checked') {
			$('#event-list-cal-event-repeat-end-date-div').hide();
		} else {
			$('#event-list-cal-event-repeat-end-date-div').show();
		}
	});
})( jQuery );