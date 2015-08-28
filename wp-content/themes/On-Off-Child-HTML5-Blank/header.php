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
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>
    <script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
    </script>
    <script src="//use.typekit.net/cef1nxg.js"></script>
    <script>try {
            Typekit.load({async: true});
        } catch (e) {
        }</script>

</head>
<body <?php body_class(); ?>>

<!-- wrapper -->
<div id="container" class="container">
    <div class="row">
        <div class="wrapper" class="toggled">

            <!-- header -->
            <header class="header clear" class="col-lg-12" role="banner">

                <div id="sidebar-wrapper" class="sidebar-nav col-lg-2">
                    <div class="bar-menu" class="col-lg-2">
                        <!-- logo -->
                        <div class="logo">
                            <a href="<?php echo home_url(); ?>">
                                <!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo-on-off.svg"
                                     alt="Logo" class="logo-img">
                            </a>
                        </div>
                        <!-- /logo -->
                        <nav class="nav col-lg-2" role="navigation">
                            <!-- nav -->
                            <br>
                            <?php html5blank_nav(); ?>

                        </nav>
                        <!-- /nav -->
                        <?php wp_sidebar_description('widget-area-1'); ?>
                    </div>
                </div>
            </header>
        </div>
    </div>
</div>

<!--        <div id="sidebar-wrapper" class="sidebar-nav">-->
<!---->
<!--            --><?php
//            wp_nav_menu(array(
//                    'menu' => 'primary',
//                    'depth' => 3,
//
//                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
//                    'walker' => new wp_bootstrap_navwalker())
//            );
//            ?>
<!---->
<!--        </div>-->
<!--        <div id="page-content-wrapper">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <a class="btn btn-default" href="#menu-toggle" id="menu-toggle">-->
<!--                        <span class="glyphicon glyphicon-align-justify"></span>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
