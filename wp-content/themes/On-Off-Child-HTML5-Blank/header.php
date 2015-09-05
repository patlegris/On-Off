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
</head>

<body>
<div class="container">
    <!--    <div class="row">-->
    <!--        <nav class="navbar">-->
    <!--            <div class="container-fluid">-->
    <!--                <!-- Brand and toggle get grouped for better mobile display -->-->
    <!--                <div class="navbar-header">-->
    <!--                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"-->
    <!--                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">-->
    <!--                        <span class="sr-only">Toggle navigation</span>-->
    <!--                        <span class="icon-bar"></span>-->
    <!--                        <span class="icon-bar"></span>-->
    <!--                        <span class="icon-bar"></span>-->
    <!--                    </button>-->
    <!--                    <!--                    <a class="navbar-brand" href="#">On-Off le studio</a>-->-->
    <!--                </div>-->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="WhiteMenu" id="">
        <!--Logo On-Off insertion-->
        <div class="logo">
            <a href="<?php echo home_url(); ?>./">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo-on-off.svg" alt="Logo"
                     class="logo-img"></a>
        </div>

        <!--Menu accordion, over/active button bootstrap style modified-->
        <div id="MainMenu">
            <ul class="list-group panel">

                <li><a href="#SubMenu1" class="list-group-item
                            list-group-item-success strong"
                       data-toggle="collapse"
                       data-parent="#MainMenu">Le lieu <i class="fa fa-caret-down"></i></a></li>


                <div class="collapse list-group-submenu" id="SubMenu1">
                    <li><a href="?page_id=37" class="list-group-item"
                           data-parent="#SubMenu1">L'espace On-Off</a></li>
                    <li><a href="?page_id=64" class="list-group-item"
                           data-parent="#SubMenu1">L'association</a></li>
                </div>

                <li><a href="?page_id=25"
                       class="list-group-item list-group-item-success"
                       data-parent="#MainMenu">Expositions</a></li>
                <li><a href="?page_id=76"
                       class="list-group-item list-group-item-success"
                       data-parent="#MainMenu">Nos artistes</a></li>
                <li><a href="?page_id=79"
                       class="list-group-item list-group-item-success"
                       data-parent="#MainMenu">Événements</a></li>
                <li><a href="?page_id=83"
                       class="list-group-item list-group-item-success"
                       data-parent="#MainMenu">Ateliers / Stages</a></li>

                <li><a href="#SubMenu2" class="list-group-item
                            list-group-item-success"
                       data-toggle="collapse"
                       data-parent="#MainMenu">Privatisation <i class="fa fa-caret-down"></i></a></li>

                <div class="collapse list-group-submenu" id="SubMenu2">
                    <li><a href="?page_id=95" class="list-group-item"
                           data-parent="#SubMenu2">Le studio</a></li>
                    <li><a href="?page_id=97" class="list-group-item"
                           data-parent="#SubMenu2">Les CGV</a></li>
                    <li><a href="?page_id=99" class="list-group-item"
                           data-parent="#SubMenu2">Les tarifs</a></li>
                </div>

                <li><a href="?page_id=148"
                       class="list-group-item list-group-item-success"
                       data-parent="#MainMenu">Contact</a></li>
            </ul>
        </div>

        <div class="LinkMenu">
            <a href="?page_id=168">Infos pratiques</a>

            <!--FORMULAIRE DE RECHERCHE-->
            <form action="" class="formSearch">
                <label class="txt_form">Rechercher</label>
                <input type="text" required class="champs_form">
                <input type="image" src="<?php echo get_template_directory_uri(); ?>/img/loupeSearch.png"
                       class="bouton_form">
            </form>

            <!--FORMULAIRE DE NEWSLETTER-->
            <form action="" class="formSearch">
                <label class="txt_form">Newsletter</label>
                <input type="text" required class="champs_form" placeholder="E-mail">
                <input type="image" src="<?php echo get_template_directory_uri(); ?>/img/newsletterOK.png"
                       class="bouton_form2">
            </form>


        </div>

        <!--RESEAUX PICTOS-->
        <p class="blockRSMenu">
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/LogoFB.png" alt="Facebook"
                             class="blockRSMenu"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/LogoInstagram.png"
                             alt="Instagram"></a>
            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/LogoVimeo.png"
                             alt="Vimeo"></a>
        </p>

        <div class="linkCredits">
            <a href="#">Crédits </a>/
            <a href="#"> Mentions légales</a>
        </div>
    </div>
    <!--</div>-->
