<?php get_header(); ?>


<!--SLIDER-->
<div class='pageblock' id='fullscreen'>
    <div class='slider'>
        <div class="container">
            <div class='slide' id="first">
                <div class='slidecontent'>
                    <div class="text">
                        <div class="button" onclick="mainslider.nextSlide();">Le lieu</div>
                    </div>
                </div>
            </div>

            <div class='slide' id="sec">
                <div class='slidecontent'>
                    <div class="text">
                        <div class="button" onclick="mainslider.nextSlide();">Les expositions</div>
                    </div>
                </div>
            </div>

            <div class='slide' id="thirth">
                <div class='slidecontent'>
                    <div class="text">
                        <div class="button" onclick="mainslider.nextSlide();">Ateliers / Stages</div>
                    </div>
                </div>
            </div>
            <div class='slide' id="fourth">
                <div class='slidecontent'>
                    <div class="text">
                        <div class="button" onclick="mainslider.nextSlide();">Privatisez l'espace</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

