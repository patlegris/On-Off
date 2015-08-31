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
    <nav class="navbar navbar-default bar-menu col-lg-2" role="navigation">
        <div id="container" class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse nav navbar-collapse bar-menu navbar-left" id="example-navbar-collapse">

                <?php
                if( is_active_sidebar('widget-area-1')) : dynamic_sidebar('widget-area-1');
                endif;?>

                <?php //html5blank_nav(); ?>
                <?php //wp_nav_menu(); ?>

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
<!--</div>-->

<!---->
<!--<div id="container" class="container">-->
<!--    <div class="row">-->
<!--        <!-- header -->
<!--        <header class="header clear" class="col-lg-12" role="banner">-->
<!--            <div class="wrapper" class="toggled">-->
<!--                <!--                <div id="sidebar-wrapper" class="sidebar-nav col-lg-2">-->
<!--                <div class="bar-menu">-->
<!--                    <!-- logo -->
<!--                    <!--                    <div class="logo">-->
<!--                    <!--                        <a href="-->
<?php ////echo home_url(); ?><!--<!--">-->
<!--                    <!--                            <!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
<!--                    -->
<!--                    <!--                            <img src="-->
<!--                    -->
<?php ////echo get_template_directory_uri(); ?><!--<!--/img/logo-on-off.svg"-->
<!--                    <!--                                 alt="Logo" class="logo-img">-->
<!--                    <!-- /logo -->
<!--                    <nav class="nav col-lg-2" role="navigation">-->
<!--                        <!-- nav -->
<!--                        <br>-->
<!--                        <!--                            -->
<!--                        <nav class='navbar navbar-default '-->
<!--                             role='navigation'>-->
<!--                            <div class='navbar-inner'>-->
<!--                                <div class='container-fluid'>-->
<!--                                    <div class='navbar-header'>-->
<!--                                        <button type='button'-->
<!--                                                class='navbar-toggle'-->
<!--                                                data-toggle='collapse'-->
<!--                                                data-target='#menu_my_bootstrap_menu_settings_primary_menu'-->
<!--                                                aria-expanded='false'>-->
<!--                                            <span class='sr-only'>Toggle navigation</span>-->
<!--                                            <span class='icon-bar'></span>-->
<!--                                            <span class='icon-bar'></span>-->
<!--                                            <span class='icon-bar'></span>-->
<!--                                        </button>-->
<!--                                        <a class='navbar-brand visible-xs ' href='http://localhost:8080/ON-OFF/'>-->
<!--                                            <img-->
<!--                                                src='http://localhost:8080/ON-OFF/wp-content/uploads/2015/08/LOGO-ON-OFF-noir-sur-fond-blanc.png'-->
<!--                                                title='http://localhost:8080/ON-OFF/'-->
<!--                                                height='150'-->
<!--                                                width='auto'>-->
<!--                                        </a></div>-->
<!--                                    <!-- close navbar-header-->
<!--                                    <div class='collapse navbar-collapse'-->
<!--                                         id='menu_my_bootstrap_menu_settings_primary_menu'><a-->
<!--                                            class='navbar-brand hidden-xs navbar-left '-->
<!--                                            href='http://localhost:8080/ON-OFF/'>-->
<!--                                            <img-->
<!--                                                src='http://localhost:8080/ON-OFF/wp-content/uploads/2015/08/LOGO-ON-OFF-noir-sur-fond-blanc.png'-->
<!--                                                title='http://localhost:8080/ON-OFF/'-->
<!--                                                height='150'-->
<!--                                                width='auto'>-->
<!--                                            <ul id="menu-primary-menu" class="menu">-->
<!--                                                <li id="menu-item-33"-->
<!--                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-33">-->
<!--                                                    <a href="http://localhost:8080/ON-OFF/?page_id=2">Le lieu</a>-->
<!--                                                    <ul class="sub-menu">-->
<!--                                                        <li id="menu-item-42"-->
<!--                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-42">-->
<!--                                                            <a-->
<!--                                                                href="/?page_id=37">L&rsquo;espace-->
<!--                                                                On-Off</a>-->
<!--                                                        </li>-->
<!--                                                        <li id="menu-item-69"-->
<!--                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-69">-->
<!--                                                            <a-->
<!--                                                                href="/?page_id=64">L&rsquo;association-->
<!--                                                                Blanc-->
<!--                                                                Titane</a></li>-->
<!--                                                    </ul>-->
<!--                                                </li>-->
<!--                                                <li id="menu-item-36"-->
<!--                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36">-->
<!--                                                    <a-->
<!--                                                        href="/?page_id=25">Expositions</a>-->
<!--                                                </li>-->
<!--                                                <li id="menu-item-85"-->
<!--                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-85">-->
<!--                                                    <a-->
<!--                                                        href="/?page_id=76">Nos artistes</a>-->
<!--                                                </li>-->
<!--                                                <li id="menu-item-86"-->
<!--                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-86">-->
<!--                                                    <a-->
<!--                                                        href="/?page_id=79">Événements</a>-->
<!--                                                </li>-->
<!--                                                <li id="menu-item-87"-->
<!--                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-87">-->
<!--                                                    <a-->
<!--                                                        href="/?page_id=83">Ateliers &#038;-->
<!--                                                        Stages</a></li>-->
<!--                                                <li id="menu-item-106"-->
<!--                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-106">-->
<!--                                                    <a href="/?page_id=88">Privatisation</a>-->
<!--                                                    <ul class="sub-menu">-->
<!--                                                        <li id="menu-item-105"-->
<!--                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-105">-->
<!--                                                            <a href="/?page_id=95">Le-->
<!--                                                                Studio</a></li>-->
<!--                                                        <li id="menu-item-104"-->
<!--                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-104">-->
<!--                                                            <a href="/?page_id=97">Les-->
<!--                                                                CGV</a></li>-->
<!--                                                        <li id="menu-item-103"-->
<!--                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-103">-->
<!--                                                            <a href="/?page_id=99">Les-->
<!--                                                                tarifs</a></li>-->
<!--                                                    </ul>-->
<!--                                            </ul>-->
<!--                                            <ul class='nav navbar-nav navbar-left'>-->
<!--                                                <li>-->
<!--                                                    <form method='get'-->
<!--                                                          id='searchform'-->
<!--                                                          action='http://localhost:8080/ON-OFF/'-->
<!--                                                          class='navbar-form'-->
<!--                                                          role='search'>-->
<!--                                                        <div class='form-group'>-->
<!--                                                            <input class='form-control'-->
<!--                                                                   type='text'-->
<!--                                                                   size=20-->
<!--                                                                   name='s'-->
<!--                                                                   id='s'-->
<!--                                                                   value='Recherche'-->
<!--                                                                   onfocus="if(this.value==this.defaultValue)this.value='';"-->
<!--                                                                   onblur="if(this.value=='')this.value=this.defaultValue;"/>-->
<!--                                                            <input type='submit'-->
<!--                                                                   id='menu_my_bootstrap_menu_settings_primary_menu_search'-->
<!--                                                                   value='search'-->
<!--                                                                   class='btn form-control hidden'/> <label-->
<!--                                                                for='menu_my_bootstrap_menu_settings_primary_menu_search'-->
<!--                                                                class='btn '>-->
<!--                                                                <i class='glyphicon-->
<!--                                                                glyphicon-search'></i>Recherche</label></div>-->
<!--                                                    </form>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                    </div>-->
<!--                        </nav>-->
<!--                </div>-->
<!--        </header>-->
<!--    </div>-->
<!--</div>-->
<body <?php body_class(); ?>>
