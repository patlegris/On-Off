/**
 * Slider created by patrick on 27/08/2015.
 */

jQuery(document).ready(function($) {
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
            magneticSwipe: true, // Add 'magnetic' swiping. When the user swipes over the screen the slides will attach
            // to the mouse's position
            transition: "fade", // Accepts "slide" and "fade" for a slide or fade transition
            slideTracker: true, // Add a UL with list items to track the current slide
            slideTrackerID: 'slideposition', // The name of the UL that tracks the slides
            slideOnInterval: true, // Slide on interval
            interval: 8000, // Interval to slide on if slideOnInterval is enabled
            animateDuration: 1500, // Duration of an animation
            animationEasing: 'easeInCirc', // Accepts: linear ease in out in-out snap easeOutCubic easeInOutCubic easeInCirc easeOutCirc easeInOutCirc easeInExpo easeOutExpo easeInOutExpo easeInQuad easeOutQuad easeInOutQuad easeInQuart easeOutQuart easeInOutQuart easeInQuint easeOutQuint easeInOutQuint easeInSine easeOutSine easeInOutSine easeInBack easeOutBack easeInOutBack
            pauseOnHover: false, // Pause when user hovers the slide container
            useDefaultCSS: false, // Add default CSS for positioning the slides
            neverEnding: true // Create a 'neverending/repeating' slider effect.
        };

        $(".slider").simpleSlider(options);
        mainslider = $(".slider").data("simpleslider");
        /* yes, that's all! */

        $(".slider").on("beforeSliding", function (event) {
            var prevSlide = event.prevSlide;
            var newSlide = event.newSlide;
            $(".slider .slide[data-index='" + prevSlide + "'] .slidecontent").fadeOut();
            $(".slider .slide[data-index='" + newSlide + "'] .slidecontent").hide();

            sliding = true;
        });

        $(".slider").on("afterSliding", function (event) {
            var prevSlide = event.prevSlide;
            var newSlide = event.newSlide;
            $(".slider .slide[data-index='" + newSlide + "'] .slidecontent").fadeIn();
            sliding = false;
        });

        /**
         * Control the slider by scrolling
         */
        $(window).bind('mousewheel', function (event) {
            if (!sliding) {
                if (event.originalEvent.deltaY > 0) {
                    mainslider.nextSlide();
                }
                else {
                    mainslider.prevSlide();
                }
            }
        });

        $(".slide#first").backstretch("/on-off/wp-content/themes/On-Off-Child-HTML5-Blank/img/bg1.jpg");
        $(".slide#sec").backstretch("/on-off/wp-content/themes/On-Off-Child-HTML5-Blank/img/bg2.jpg");
        $(".slide#thirth").backstretch("/on-off/wp-content/themes/On-Off-Child-HTML5-Blank/img/bg3.jpg");
        $(".slide#fourth").backstretch("/on-off/wp-content/themes/On-Off-Child-HTML5-Blank/img/bg4.jpg");
        $(".slide#fifth").backstretch("/on-off/wp-content/themes/On-Off-Child-HTML5-Blank/img/bg5.jpg");

        $('.slide .backstretch img').on('dragstart', function (event) {
            event.preventDefault();
        });

        $(".slidecontent").each(function () {
            $(this).css('margin-top', -$(this).height() / 2);
        });
    });
});