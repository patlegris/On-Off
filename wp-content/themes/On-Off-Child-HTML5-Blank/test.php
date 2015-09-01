<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!--Bootstrap CSS - Normalize CSS and Main CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="style.css">

    <!--&lt;!&ndash;jQuery / jQuery-migrate Scripts on CDN and local&ndash;&gt;-->
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <!--<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.11.3.min.js"><\/script>')</script>-->
    <!--<script src="assets/js/vendor/jquery-migrate-1.2.1.min.js"></script>-->
</head>


<header>

    <!-- nav -->
    <nav class="navbar" role="navigation">
        <div id="container" class="container">
            <div class="navbar-header navbar-default">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse nav navbar-collapse bar-menu" id="example-navbar-collapse">

                <!--Logo On-Off insertion-->
                <div class="logo">
                    <a href="<?php echo home_url(); ?>./">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-on-off.svg" alt="Logo"
                             class="logo-img"></a>
                </div>


                <!--Widget menu 'widget-area-1' insertion-->
                <?php if (is_active_sidebar('widget-area-1')) : dynamic_sidebar('widget-area-1');
                endif; ?>
                <?php html5blank_nav(); ?>
                <!--                --><?php //wp_nav_menu(); ?>

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

<body>


<div class="container main-container">
    <!--    <div class="row col-lg-12"-->
    <div class="col-md-2">
    </div>
    <div class="main wrapper clearfix col-md-7">
        <h1><?php single_post_title(); ?></h1>
        <?php get_template_part('loop'); ?>
        <aside>
            <?php get_sidebar(); ?>
        </aside>
    </div>
</div>

</body>

<!--Author JS-->
<script src="js/scripts.js"></script>
<!--Bootstrap JS-->
<script src="js/lib/bootstrap.min.js"></script>
<!--JS for plugins jQuery-->
<script src="js/lib/plugins.js"></script>
<!--jquery.SimpleSlider-->
<script type="text/javascript" src="js/lib/jquery.simpleslider.package.min.js"></script>
<!--jquery.backstretch-->
<script src="js/lib/jquery.backstretch.js"></script>

<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>

</body>
<footer>

</footer>
</html>
