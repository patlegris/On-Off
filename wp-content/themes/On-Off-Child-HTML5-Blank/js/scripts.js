(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		
	});
	
})(jQuery, this);

// Avoid `console` errors in browsers that lack a console.------
(function () {
	var method;
	var noop = function () {
	};
	var methods = [
		'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
		'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
		'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
		'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
	];
	var length = methods.length;
	var console = (window.console = window.console || {});

	while (length--) {
		method = methods[length];

		// Only stub undefined methods.
		if (!console[method]) {
			console[method] = noop;
		}
	}
}());

on( 'wp_enqueue_scripts', 'load_javascript_files' );

// Ouverture de la fenêtre et de l'accordion SubMenu1
function SubMenu1 () {
	location.href='?page_id=2';
	location.href='#SubMenu1';
	return false;
}

// Ouverture de la fenêtre et de l'accordion SubMenu2
function SubMenu2 () {
	location.href='?page_id=88';
	location.href='#SubMenu1';
	return false;
}