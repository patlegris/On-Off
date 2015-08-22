jQuery(document).ready(function($) {

	function isCurrentDay(calType) {

		if(calType == 'full') {
			calendarDate = $('#event-list-cal table').attr('id').split('-'),
			$('#event-list-cal td.today').removeClass('today');
		} else {
			calendarDate = $('#event-list-mini-cal table').attr('id').split('-'),
			$('#event-list-mini-cal td.today').removeClass('today');
		}
		var calendarMonth = calendarDate[0],
		calendarYear = calendarDate[1],
		d = new Date();

		if(calendarMonth == (d.getMonth() + 1) && calendarYear == d.getFullYear()) {
			if(calType == 'full') {
				$('.event-list-cal-day').each(function() {
					if($(this).text() == d.getDate()) {
						$(this).parent().addClass('today');
					}
				});
			} else {
				$('.event-list-mini-cal-day').each(function() {
					if($(this).text() == d.getDate()) {
						$(this).parent().addClass('today');
					}
				});
			}
		}
	}

	$('#event-list-cal-prev a').attr('href', '#');
	$('#event-list-cal-next a').attr('href', '#');
	$('#event-list-mini-cal-prev a').attr('href', '#');
	$('#event-list-mini-cal-next a').attr('href', '#');

	var Months = {
		de: ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"],
		en: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
		es: ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"],
		fr: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
		nl:	["januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december"]
	},
	prevMonth, nextMonth, loadYear, loadMonth, data, working = 0;

	if($('#event-list-cal').length != 0 || $('#event-list-mini-cal').length != 0) {
		if($('#event-list-cal').length != 0) {
			var tableData = $('#event-list-cal table').attr('id').split('-'),
			lang = tableData[3];
		}
		if($('#event-list-mini-cal').length != 0) {
			var tableData = $('#event-list-mini-cal table').attr('id').split('-'),
			lang = tableData[3];
		}
		if(!(lang in Months)) {
			lang = 'en';
		}
	}

	$('#event-list-cal-prev a').click(function() {

		currentDate = $('#event-list-cal table').attr('id').split('-'),
		currentMnth = parseInt(currentDate[0]),
		currentYear = parseInt(currentDate[1]);

		if(working == 0) {
			$('#event-list-cal').animate({ opacity : 0.2 }, 300);
		}

		working = 1;

		if(currentMnth == 1) {
			loadYear = currentYear - 1;
			loadMonth = 12;
			prevMonth = Months[lang][10];
			nextMonth = Months[lang][0];
		} else {
			loadYear = currentYear;
			loadMonth = currentMnth - 1;
			if(loadMonth == 1) {
				prevMonth = Months[lang][11];
			} else {
				prevMonth = Months[lang][loadMonth - 2];
			}
			nextMonth = Months[lang][loadMonth];
		}

		$('#event-list-cal table').attr('id', loadMonth + '-' + loadYear + '-full-' + currentDate[3] + '-' + currentDate[4]);
		$('#event-list-cal-month').text(Months[lang][loadMonth - 1] + ' ' + loadYear);
		$('#event-list-cal-prev a').text(prevMonth);
		$('#event-list-cal-next a').text(nextMonth);

		data = {
			action: 'event_list_cal',
			year: loadYear,
			month: loadMonth,
			security: eventListCal.security
		};

		$.post(eventListCal.ajaxurl, data, function(response) {

			$('#event-list-cal').html(response);
			$('#event-list-cal').animate({ opacity : 1 }, 500);
			working = 0;

			isCurrentDay('full');
		});

		return false;

	});
	$('#event-list-cal-next a').click(function() {

		currentDate = $('#event-list-cal table').attr('id').split('-'),
		currentMnth = parseInt(currentDate[0]),
		currentYear = parseInt(currentDate[1]);

		if(working == 0) {
			$('#event-list-cal').animate({ opacity : 0.2 }, 300);
		}

		working = 1;

		if(currentMnth == 12) {
			loadYear = currentYear + 1;
			loadMonth = 1;
			prevMonth = Months[lang][11];
			nextMonth = Months[lang][1];
		} else {
			loadYear = currentYear;
			loadMonth = currentMnth + 1;
			prevMonth = Months[lang][loadMonth - 2];
			if(loadMonth == 12) {
				nextMonth = Months[lang][0];
				prevMonth = Months[lang][10];
			} else {
				nextMonth = Months[lang][loadMonth];
			}
		}

		$('#event-list-cal table').attr('id', loadMonth + '-' + loadYear + '-full-' + currentDate[3] + '-' + currentDate[4]);
		$('#event-list-cal-month').text(Months[lang][loadMonth - 1] + ' ' + loadYear);
		$('#event-list-cal-prev a').text(prevMonth);
		$('#event-list-cal-next a').text(nextMonth);

		data = {
			action: 'event_list_cal',
			year: loadYear,
			month: loadMonth,
			security: eventListCal.security
		};

		$.post(eventListCal.ajaxurl, data, function(response) {

			$('#event-list-cal').html(response);
			$('#event-list-cal').animate({ opacity : 1 }, 500);
			working = 0;

			isCurrentDay('full');
		});

		return false;

	});
	$('#event-list-mini-cal-prev a').click(function() {

		currentDate = $('#event-list-mini-cal table').attr('id').split('-'),
		currentMnth = parseInt(currentDate[0]),
		currentYear = parseInt(currentDate[1]);

		if(working == 0) {
			$('#event-list-mini-cal').animate({ opacity : 0.2 }, 300);
		}

		working = 1;

		if(currentMnth == 1) {
			loadYear = currentYear - 1;
			loadMonth = 12;
		} else {
			loadYear = currentYear;
			loadMonth = currentMnth - 1;
		}

		$('#event-list-mini-cal table').attr('id', loadMonth + '-' + loadYear + '-mini-' + currentDate[3] + '-' + currentDate[4]);
		$('#event-list-mini-cal-date').text(Months[lang][loadMonth - 1] + ' ' + loadYear);

		data = {
			action: 'event_list_mini_cal',
			year: loadYear,
			month: loadMonth,
			security: eventListMiniCal.security
		};

		$.post(eventListMiniCal.ajaxurl, data, function(response) {

			$('#event-list-mini-cal').html(response);
			$('#event-list-mini-cal').animate({ opacity : 1 }, 500);
			working = 0;

			isCurrentDay('mini');
		});

		return false;
	});
	$('#event-list-mini-cal-next a').click(function() {

		currentDate = $('#event-list-mini-cal table').attr('id').split('-'),
		currentMnth = parseInt(currentDate[0]),
		currentYear = parseInt(currentDate[1]);

		if(working == 0) {
			$('#event-list-mini-cal').animate({ opacity : 0.2 }, 300);
		}

		working = 1;

		if(currentMnth == 12) {
			loadYear = currentYear + 1;
			loadMonth = 1;
		} else {
			loadYear = currentYear;
			loadMonth = currentMnth + 1;
		}

		$('#event-list-mini-cal table').attr('id', loadMonth + '-' + loadYear + '-mini-' + currentDate[3] + '-' + currentDate[4]);
		$('#event-list-mini-cal-date').text(Months[lang][loadMonth - 1] + ' ' + loadYear);

		data = {
			action: 'event_list_mini_cal',
			year: loadYear,
			month: loadMonth,
			security: eventListMiniCal.security
		};

		$.post(eventListMiniCal.ajaxurl, data, function(response) {

			$('#event-list-mini-cal').html(response);
			$('#event-list-mini-cal').animate({ opacity : 1 }, 500);
			working = 0;

			isCurrentDay('mini');
		});

		return false;
	});
});