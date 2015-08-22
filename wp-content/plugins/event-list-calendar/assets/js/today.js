(function( $ ) {

	function isCurrentDay() {

		calendarDate = $('#event-list-cal table').attr('id').split('-'),
		calendarMonth = calendarDate[0],
		calendarYear = calendarDate[1]
		d = new Date();

		$('td.today').removeClass('today');

		if(calendarMonth == (d.getMonth() + 1) && calendarYear == d.getFullYear()) {
			$('.event-list-cal-day').each(function() {
				if($(this).text() == d.getDate()) {
					$(this).parent().addClass('today');
				}
			});
			$('.event-list-mini-cal-day').each(function() {
				if($(this).text() == d.getDate()) {
					$(this).parent().addClass('today');
				}
			});
		}
	}
	isCurrentDay();

})( jQuery );