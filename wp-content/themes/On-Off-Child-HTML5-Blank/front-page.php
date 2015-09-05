<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if (wp_title('', false)) {
            echo ' :';
        } ?><?php bloginfo('name'); ?></title>

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_template_directory_uri(); ?>img/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>img/icons/touch.png" rel="apple-touch-icon-precomposed">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/slider.css">


    <?php wp_head(); ?>
    <script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
    </script>
</head>

<style> .WhiteMenu {
        display: block;
        position: absolute;
        z-index: 20000;
    }</style>

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


<!--                --><?php //html5blank_nav(); ?>



<?php get_footer(); ?>

