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


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img alt="On-Off Studio" src=""<?php echo get_template_directory_uri(); ?>/img/logo-on-off.svg"
                alt="Logo"
                class="logo-img"">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse bar-menu" id="bs-example-navbar-collapse-1">
            <!--Menu accordion, over/active button bootstrap style modified-->
            <div id="MainMenu">
                <ul class="list-group panel">

                    <li><a href="#SubMenu1" class="list-group-item list-group-item-success" data-toggle="collapse"
                           data-parent="#MainMenu">Le lieu <i class="fa fa-caret-down"></i></a></li>


                    <div class="collapse list-group-submenu" id="SubMenu1">
                        <li><a href="http://localhost:8080/ON-OFF/?page_id=37" class="list-group-item"
                               data-parent="#SubMenu1">L'espace On-Off</a></li>
                        <li><a href="http://localhost:8080/ON-OFF/?page_id=64" class="list-group-item"
                               data-parent="#SubMenu1">L'association</a></li>
                    </div>

                    <li><a href="http://localhost:8080/ON-OFF/?page_id=25"
                           class="list-group-item list-group-item-success"
                           data-parent="#MainMenu">Expositions</a></li>
                    <li><a href="http://localhost:8080/ON-OFF/?page_id=76"
                           class="list-group-item list-group-item-success"
                           data-parent="#MainMenu">Nos artistes</a></li>
                    <li><a href="http://localhost:8080/ON-OFF/?page_id=79"
                           class="list-group-item list-group-item-success"
                           data-parent="#MainMenu">Événements</a></li>
                    <li><a href="http://localhost:8080/ON-OFF/?page_id=83"
                           class="list-group-item list-group-item-success"
                           data-parent="#MainMenu">Ateliers / Stages</a></li>

                    <li><a href="#SubMenu2" class="list-group-item list-group-item-success" data-toggle="collapse"
                           data-parent="#MainMenu">Privatisation <i class="fa fa-caret-down"></i></a></li>

                    <div class="collapse list-group-submenu" id="SubMenu2">
                        <li><a href="http://localhost:8080/ON-OFF/?page_id=95" class="list-group-item"
                               data-parent="#SubMenu2">Le studio</a></li>
                        <li><a href="http://localhost:8080/ON-OFF/?page_id=97" class="list-group-item"
                               data-parent="#SubMenu2">Les CGV</a></li>
                        <li><a href="http://localhost:8080/ON-OFF/?page_id=99" class="list-group-item"
                               data-parent="#SubMenu2">Les tarifs</a></li>
                    </div>

                    <li><a href="http://localhost:8080/ON-OFF/?page_id=148"
                           class="list-group-item list-group-item-success"
                           data-parent="#MainMenu">Contact</a></li>
                </ul>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<div class="bar-menu col-md-2">
    <div class="collapse nav navbar-collapse navbar-left " id="example-navbar-collapse">
        <!--Logo On-Off insertion-->
        <div class="logo">
            <a href="<?php echo home_url(); ?>./">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo-on-off.svg" alt="Logo"
                     class="logo-img"></a>
        </div>

        <br>
        <!--Menu accordion, over/active button bootstrap style modified-->
        <div id="MainMenu">
            <ul class="list-group panel">

                <li><a href="#SubMenu1" class="list-group-item list-group-item-success" data-toggle="collapse"
                       data-parent="#MainMenu">Le lieu <i class="fa fa-caret-down"></i></a></li>


                <div class="collapse list-group-submenu" id="SubMenu1">
                    <li><a href="http://localhost:8080/ON-OFF/?page_id=37" class="list-group-item"
                           data-parent="#SubMenu1">L'espace On-Off</a></li>
                    <li><a href="http://localhost:8080/ON-OFF/?page_id=64" class="list-group-item"
                           data-parent="#SubMenu1">L'association</a></li>
                </div>

                <li><a href="http://localhost:8080/ON-OFF/?page_id=25"
                       class="list-group-item list-group-item-success"
                       data-parent="#MainMenu">Expositions</a></li>
                <li><a href="http://localhost:8080/ON-OFF/?page_id=76"
                       class="list-group-item list-group-item-success"
                       data-parent="#MainMenu">Nos artistes</a></li>
                <li><a href="http://localhost:8080/ON-OFF/?page_id=79"
                       class="list-group-item list-group-item-success"
                       data-parent="#MainMenu">Événements</a></li>
                <li><a href="http://localhost:8080/ON-OFF/?page_id=83"
                       class="list-group-item list-group-item-success"
                       data-parent="#MainMenu">Ateliers / Stages</a></li>

                <li><a href="#SubMenu2" class="list-group-item list-group-item-success" data-toggle="collapse"
                       data-parent="#MainMenu">Privatisation <i class="fa fa-caret-down"></i></a></li>

                <div class="collapse list-group-submenu" id="SubMenu2">
                    <li><a href="http://localhost:8080/ON-OFF/?page_id=95" class="list-group-item"
                           data-parent="#SubMenu2">Le studio</a></li>
                    <li><a href="http://localhost:8080/ON-OFF/?page_id=97" class="list-group-item"
                           data-parent="#SubMenu2">Les CGV</a></li>
                    <li><a href="http://localhost:8080/ON-OFF/?page_id=99" class="list-group-item"
                           data-parent="#SubMenu2">Les tarifs</a></li>
                </div>

                <li><a href="http://localhost:8080/ON-OFF/?page_id=148"
                       class="list-group-item list-group-item-success"
                       data-parent="#MainMenu">Contact</a></li>
            </ul>
        </div>


        <!--                --><?php //html5blank_nav(); ?>

        <!--            <img src="-->
        <?php //echo get_template_directory_uri(); ?><!--./img/provisoire.png"-->
        <!--                 class="img-thumbnail">-->

        <!-- Search form-->
        <!--            <ul class="">-->
        <!--                <li>-->
        <!--                    <form class="navbar-form navbar-left"-->
        <!--                          method='get' ,-->
        <!--                          id='searchform'-->
        <!--                          action='http://localhost:8080/ON-OFF/'-->
        <!--                          class='navbar-form'-->
        <!--                          role='search'>-->
        <!--                        <div class='form-group'>-->
        <!--                            <input class='form-control'-->
        <!--                                   type='text'-->
        <!--                                   size=16-->
        <!--                                   name='s'-->
        <!--                                   id='s'-->
        <!--                                   value='Votre recherche...'-->
        <!--                                   onfocus="if(this.value==this.defaultValue)this.value='';"-->
        <!--                                   onblur="if(this.value=='')this.value=this.defaultValue;"/>-->
        <!--                            <button type="submit" class="btn btn-default">Recherche</button>-->
        <!--                            <!--                                    <label-->
        <!--                            <!--                                        for='menu_my_bootstrap_menu_settings_primary_menu_search'-->
        <!--                            <!--                                        class='btn '>-->
        <!--                            <!--                                        <i class='glyphicon glyphicon-search'></i>Recherche</label>-->
        <!--                            <div class="form-group">-->
        <!--                                <input type="text" placeholder="Email" class="form-control">-->
        <!--                            </div>-->
        <!--                            <!--                                --><?php ////get_sidebar(); ?>
        <!--                        </div>-->
        <!--                    </form>-->
        <!--                </li>-->
        <!--            </ul>-->
    </div>
</div>


<?php //get_header(); ?>


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

