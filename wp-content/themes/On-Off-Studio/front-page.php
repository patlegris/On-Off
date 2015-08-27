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
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/css/vendor/normalize.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <!--jQuery / jQuery-migrate Scripts and CDN-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
    <script src="assets/js/vendor/jquery-migrate-1.2.1.min.js"></script>


    <!--<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>-->
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->


<!--<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">-->
<!--<div class="container">-->
<!--<div class="navbar-header">-->
<!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"-->
<!--aria-expanded="false" aria-controls="navbar">-->
<!--<span class="sr-only">Toggle navigation</span>-->
<!--<span class="icon-bar">Accueil</span>-->
<!--<span class="icon-bar">On-Off</span>-->
<!--<span class="icon-bar">l'Offre</span>-->
<!--</button>-->
<!--<a class="navbar-brand" href="#">On-Off</a>-->
<!--</div>-->
<!--<div id="navbar" class="navbar-collapse collapse">-->
<!--</div>-->
<!--&lt;!&ndash;/.navbar-collapse &ndash;&gt;-->
<!--</div>-->
<!--</nav>-->

<!--<div class="container">-->
<div class='pageblock' id='fullscreen'>
    <div class='slider'>
        <div class='slide' id="first">
            <div class='slidecontent'>
                <span class="headersur">Le studio de convergence créative</span>

                <h1>On-Off</h1>

                <div class="button" onclick="mainslider.nextSlide();">Les stages et ateliers -></div>
            </div>
        </div>

        <div class='slide' id="sec">
            <div class='slidecontent'>
                <span class="headersur">Apprendre, créér et partager</span>

                <h1>ATELIERS</h1>

                <div class="text">
                    <div class="button" onclick="mainslider.nextSlide();">Les expositions -></div>
                </div>
            </div>
        </div>

        <div class='slide' id="thirth">
            <div class='slidecontent'>
                <span class="headersur">L'art se déploie</span>

                <h1>EXPOSITIONS</h1>

                <div class="text">
                    <div class="button" onclick="mainslider.nextSlide();">Réservez l'espace On-Off -></div>
                </div>
            </div>
        </div>
        <div class='slide' id="fourth">
            <div class='slidecontent'>
                <span class="headersur">Privatisation de l'espace On-Off</span>

                <h1>PRIVATISATION</h1>

                <div class="text">
                    <div class="button" onclick="mainslider.nextSlide();">On-Off le studio -></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--&lt;!&ndash; Example row of columns &ndash;&gt;-->
<!--<div class="row">-->
<!--<div class="col-md-4">-->
<!--<h2>Heading</h2>-->
<!--<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>-->
<!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
<!--</div>-->
<!--<div class="col-md-4">-->
<!--<h2>Heading</h2>-->
<!--<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>-->
<!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
<!--</div>-->
<!--<div class="col-md-4">-->
<!--<h2>Heading</h2>-->
<!--<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>-->
<!--<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>-->
<!--</div>-->
<!--</div>-->


<!--<footer>-->
<!--<p>&copy; On-Off Studio - 2015</p>-->
<!--</footer>-->
<!--</div>-->

<!--Bootstrap JS-->
<script src="assets/js/vendor/bootstrap.min.js"></script>
<!--JS for plugins jQuery-->
<script src="assets/js/plugins.js"></script>
<!--Other JS-->
<script src="assets/js/main.js"></script>
<!--jquery.backstretch-->
<script src="assets/js/vendor/jquery.backstretch.js"></script>
<!--Slider Script-->
<script type="text/javascript" src="assets/js/vendor/jquery.simpleslider.package.min.js"></script>

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
