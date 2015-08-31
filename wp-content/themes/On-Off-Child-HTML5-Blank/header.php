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
<header>
    <!-- nav -->
    <nav class="navbar navbar-default bar-menu" role="navigation">
        <div id="container" class="container">
            <div class="row col-lg-12"
            <div class="navbar-header col-md-2 col-lg-2">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse nav navbar-collapse bar-menu navbar-left" id="example-navbar-collapse">

                <!--Logo On-Off insertion-->
                <div class="logo">
                    <a href="<?php echo home_url(); ?>./">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-on-off.svg" alt="Logo"
                         class="logo-img"></a>
                </div>


                <!--Widget menu 'widget-area-1' insertion-->
                <?php if (is_active_sidebar('widget-area-1')) : dynamic_sidebar('widget-area-1');
                endif; ?>
                <?php //html5blank_nav(); ?>
                <?php //wp_nav_menu(); ?>

                <img src="<?php echo get_template_directory_uri(); ?>./img/provisoire.png"
                     class="img-thumbnail">

                <!-- Search form-->
                <ul class="">
                    <li>
                        <form class="navbar-form navbar-left"
                              method='get' ,
                              id='searchform'
                              action='http://localhost:8080/ON-OFF/'
                              class='navbar-form'
                              role='search'>
                            <div class='form-group'>
                                <input class='form-control'
                                       type='text'
                                       size=16
                                       name='s'
                                       id='s'
                                       value='Votre recherche...'
                                       onfocus="if(this.value==this.defaultValue)this.value='';"
                                       onblur="if(this.value=='')this.value=this.defaultValue;"/>
                                <button type="submit" class="btn btn-default">Recherche</button>
                                <!--                                    <label-->
                                <!--                                        for='menu_my_bootstrap_menu_settings_primary_menu_search'-->
                                <!--                                        class='btn '>-->
                                <!--                                        <i class='glyphicon glyphicon-search'></i>Recherche</label>-->
                                <div class="form-group">
                                    <input type="text" placeholder="Email" class="form-control">
                                </div>
<!--                                --><?php //get_sidebar(); ?>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body <?php body_class(); ?>>
