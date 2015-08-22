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
    <link rel="apple-touch-icon" href="<?php bloginfo('template_url') ?>apple-touch-icon.png">

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main.css">

    <script src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<div class="header-container">
    <header class="wrapper clearfix">
        <h1 class="title">h1.title</h1>
        <nav>
            <ul>
                <li><a href="#">nav ul li a</a></li>
                <li><a href="#">nav ul li a</a></li>
                <li><a href="#">nav ul li a</a></li>
            </ul>
        </nav>
    </header>
</div>

<div class="main-container">
    <div class="main wrapper clearfix">
        <?php get_template_part('loop', 'excerpt'); ?><!-- loop-excerpt-->

        <aside>
            <h3>aside</h3>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor.
                Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper
                consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor. Etiam
                ullamcorper lorem dapibus velit suscipit ultrices.</p>
        </aside>

    </div>
    <!-- #main -->
</div>
<!-- #main-container -->

<div class="footer-container">
    <footer class="wrapper">
        <h3>footer</h3>
    </footer>
</div>

<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<!--<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>-->

<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
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
</html>
