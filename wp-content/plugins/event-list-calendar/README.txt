=== Event List Calendar ===
Contributors: ryanfait 
Donate link: http://ryanfait.com/donate/
Tags: calendar, events, event list, upcoming events, ajax
Requires at least: 3.9
Tested up to: 4.0
Stable tag: 1.7

Adds an Events section to the admin which allows you to post events and
display them in an ajax powered calendar or a simple list of upcoming
events.



== Description ==

This plugin adds an Event post type to the WordPress admin where you can
add events. You can specify title, description, categories, date and time
of the event.

Multiple day events are supported. Events that repeat yearly, monthly or
weekly are also supported and have the option for an end date.

The shortcode [calendar] will display a large monthly calendar. It's Ajax
powered allowing you to go to the next and previous months without page
refreshes. It degrades gracefully if JavaScript is disabled.

The shortcode [upcoming-events] will display a simple unordered list of
the next five upcoming events. This is perfect for using in a text widget.

The shortcode [mini-calendar] displays a smaller Ajax calendar more suited
for use in text widgets and sidebars.


= Calendar Options =

The [calendar] shortcode supports year and month attributes if you wish to
display a specific month: [calendar year="2015" month="09"]


= Upcoming Events List Options =

If you want to show more or less than the default five events, use the
"num_events" attribute: [upcoming-events num_events="3"].

You can also filter an upcoming event list by one or more categories using
the shortcode: [upcoming-events categories="birthdays,news"]


= Things to Come =

* More themes
* Import utility
* Today's events shortcode


= Demo =

http://event-list-calendar.ryanfait.com

= More Information =

http://ryanfait.com/resources/wordpress-event-list-calendar-plugin/



== Installation ==

Extract the zip file and just drop the contents in the wp-content/plugins/
directory of your WordPress installation and then activate the Plugin from
Plugins page.



== Screenshots ==

1. A view of the "Add Event" page in the WordPress admin which has extra
   fields for the event date and event time.

2. A view of the Ajax powered calendar with the mouse hovered over an
   event to show the time of the event and the excerpt from the event.

3. A screenshot of the mini calendar with the mouse hovering over a day
   that has events.

4. The main Events section where your events are displayed. You can sort
   by name, event date and more.

5. A view of the Events Settings Page where you can specify custom date
   formats for the upcoming event lists and single event pages and choose
   a theme.

6. A screenshot of the Ajax powered calendar with the dark theme selected.

7. A view of the Events About page that gets added to the WordPress admin.
   It contains basic instructions for using the shortcodes and additional
   information.



== Changelog ==

= 1.7 =
* Improved support for translation
* English, French, Dutch, German and Spanish are partially supported.
  Contact me to add your language
* Mini calendar shows today properly now

= 1.6.5 =
* Added a 'There are no upcoming events.' message for the upcoming events
  list in the case that there are not any  
  
= 1.6.4 =
* Bug fix for upcoming events list where events get printed twice

= 1.6.3 =
* Bug fix for Ajax calls when not logged in
* Minor bug fix that caused a non-existent theme stylesheet to try to be
  loaded

= 1.6.2 =
* Rolling back update after finding a major bug

= 1.6.1 =
* Updated the About page for the new Mini Calendar shortcode

= 1.6 =
* New [mini-calendar] shortcode. Perfect for placing in a text widget in
  your sidebar
* Added a couple of classes to make customization easier


= 1.5 =
* Added theme section to settings to allow you to choose between a light
  or a dark calendar
* Added columns to WordPress admin so more event information is displayed
  without having to actually view the event

= 1.4.2 =
* Recoded the upcoming events shortcode so repeating events show up there

= 1.4.1 =
* Bug fix for weekly repeating events

= 1.4 =
* Added a settings page to allow you to set custom date formats for the
  upcoming event lists and single event pages
* Added a 'There are no upcoming events.' message for the upcoming events
  list in the case that there are not any  
* Improved support for translation should anyone be interested in doing so
* Bug fix for repeating events

= 1.3.1 =
* Minor bug fix that resolves an issue with other plugins that use
  wp_query

= 1.3 =
* Event date, time and repetition information now gets displayed on single
  event pages, so there is no longer a need to modify your theme.

= 1.2 =
* Added support for an end date for repeating events
* Simplified the event repeat and event days section in the admin
* Improved CSS for calendar on small devices
* Improved support for translation
* Fixed a couple of minor bugs in the repeating events in upcoming lists

= 1.1.1 =
* Fixed minor bug and updated readme.txt

= 1.1 =
* Added support for events that repeat yearly, monthly or weekly

= 1.0 =
* Added support for multiple day events

= 0.3.3 =
* Fixed a bug that caused some errors to appear in WordPress 4.0
* Changed menu icon

= 0.3.2 =
* Added a JavaScript file for the front-end that highlights the "Today"
  calendar cell based on the visitor's computer time rather than the
  timezone set in WordPress.

= 0.3.1 =
* Fixed a bug that was using the server time to display the current month
  instead of the timezone set by WordPress

= 0.3 =
* Added support for event categories
* Added a categories attribute to the [upcoming-events] shortcode. You can
  now filter upcoming events by one or more categories using the category
  slug. [upcoming-events categories="birthdays,holidays"]
* Added a month and year attribute to the [calendar] shortcode to allow
  you to start the calendar at specific month. For example,
  [calendar year="2015" month="09"]

= 0.2.1 =
* Fixed an odd bug that caused certain upcoming events to show up even
  when the date had passed by a few days

= 0.2 =
* Added support for the calendar to start on either Monday or Sunday
* Minor HTML bug fixes
* The "Today" calendar cell that gets highlighted uses the timezone set in
  the WordPress settings.

= 0.1 =
* Tested in IE8, Chrome, Safari and Firefox