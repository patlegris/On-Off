// Avoid `console` errors in browsers that lack a console.------
(function() {
    var method;
    var noop = function () {};
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

//SLIDER --------------------------------------------------------
$(document).ready(function () {
    $(".slider").simpleSlider();
});

var mainslider;
var sliding = false;

$(document).ready(function () {
    // Default options
    var options = {
        slides: '.slide', // The name of a slide in the slidesContainer
        swipe: true,    // Add possibility to Swipe
        magneticSwipe: true, // Add 'magnetic' swiping. When the user swipes over the screen the slides will attach to the mouse's position
        transition: "fade", // Accepts "slide" and "fade" for a slide or fade transition
        slideTracker: true, // Add a UL with list items to track the current slide
        slideTrackerID: 'slideposition', // The name of the UL that tracks the slides
        slideOnInterval: true, // Slide on interval
        interval: 10000, // Interval to slide on if slideOnInterval is enabled
        animateDuration: 1500, // Duration of an animation
        animationEasing: 'easeInOut', // Accepts: linear ease in out in-out snap easeOutCubic easeInOutCubic easeInCirc easeOutCirc easeInOutCirc easeInExpo easeOutExpo easeInOutExpo easeInQuad easeOutQuad easeInOutQuad easeInQuart easeOutQuart easeInOutQuart easeInQuint easeOutQuint easeInOutQuint easeInSine easeOutSine easeInOutSine easeInBack easeOutBack easeInOutBack
        pauseOnHover: false, // Pause when user hovers the slide container
        useDefaultCSS: false, // Add default CSS for positioning the slides
        neverEnding: true // Create a 'neverending/repeating' slider effect.
    };

    $(".slider").simpleSlider(options);
    mainslider = $(".slider").data("simpleslider");
    /* yes, that's all! */

    $(".slider").on("beforeSliding", function(event){
        var prevSlide = event.prevSlide;
        var newSlide = event.newSlide;
        $(".slider .slide[data-index='" + prevSlide + "'] .slidecontent").fadeOut();
        $(".slider .slide[data-index='" + newSlide + "'] .slidecontent").hide();

        sliding = true;
    });

    $(".slider").on("afterSliding", function(event){
        var prevSlide = event.prevSlide;
        var newSlide = event.newSlide;
        $(".slider .slide[data-index='"+newSlide+"'] .slidecontent").fadeIn();
        sliding = false;
    });

    /**
     * Control the slider by scrolling
     */
    $(window).bind('mousewheel', function(event) {
        if(!sliding){
            if(event.originalEvent.deltaY > 0){
                mainslider.nextSlide();
            }
            else{
                mainslider.prevSlide();
            }
        }
    });

    $(".slide#first").backstretch("assets/images/bg1.jpg");
    $(".slide#sec").backstretch("assets/images/bg2.jpg");
    $(".slide#thirth").backstretch("assets/images/bg3.jpg");
    $(".slide#fourth").backstretch("assets/images/bg4.jpg");
    $(".slide#fifth").backstretch("assets/images/bg5.jpg");

    $('.slide .backstretch img').on('dragstart', function(event) { event.preventDefault(); });

    $(".slidecontent").each(function(){
        $(this).css('margin-top', -$(this).height()/2);
    });
});


//Backstretch --------------------------------------------------------
