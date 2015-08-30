/**
 * Created by Michael on 19/06/2015.
 */

jQuery(document).ready(function($) {

    //Stack menu when collapsed
    $('.navbar-collapse').on('show.bs.collapse', function () {
        $('.nav-pills, .nav-tabs').addClass('nav-stacked');
        $('.btn-group.navbar-btn, .navbar-btn').addClass('btn-group-vertical');
    });

    //Unstack menu when not collapsed
    $('.navbar-collapse').on('hide.bs.collapse', function () {
        $('.nav-pills, .nav-tabs').removeClass('nav-stacked');
        $('.btn-group.navbar-btn, .navbar-btn').removeClass('btn-group-vertical');
    });

});