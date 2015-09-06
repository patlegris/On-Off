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
        } ?><?php bloginfo('On-Off Le studio'); ?></title>

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <!--    Kit de police brandon-->
    <script src="https://use.typekit.net/cef1nxg.js"></script>
    <script>try {
            Typekit.load({async: true});
        } catch (e) {
        }</script>

    <?php wp_head(); ?>
    <!--    Conditionizer config-->
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
<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <nav class="navbar">-->
<!--            <div class="container-fluid">-->
<!--                <!-- Brand and toggle get grouped for better mobile display -->
<!--                <div class="navbar-header">-->
<!--                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"-->
<!--                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">-->
<!--                        <span class="sr-only">Toggle navigation</span>-->
<!--                        <span class="icon-bar"></span>-->
<!--                        <span class="icon-bar"></span>-->
<!--                        <span class="icon-bar"></span>-->
<!--                    </button>-->
<!--                    <!--                    <a class="navbar-brand" href="#">On-Off le studio</a>-->
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

<!--    --><?php //get_sidebar(); ?>

    <div class="LinkMenu">

        <!--    Langues-->
        <div id="polylang-2" class="widget_polylang">
            <ul>
                <li class="lang-item lang-item-16 lang-item-fr current-lang"><a hreflang="fr"
                                                                                href="http://localhost:8080/ON-OFF/?page_id=25"><img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAGzSURBVHjaYiyeepkBBv79+Zfnx/f379+fP38CyT9//jAyMiq5GP77wvDnJ8MfoAIGBoAAYgGqC7STApL///3/9++/pCTv////Qdz/QO4/IMna0vf/z+9/v379//37bUUTQACBNDD8Z/j87fffvyAVX79+/Q8GQDbQeKA9fM+e/Pv18/+vnwzCIkBLAAKQOAY5AIAwCEv4/4PddNUm3ji0QJyxW3rgzE0iLfqDGr2oYuu0l54AYvnz5x9Q6d+/QPQfyAQqAin9B3EOyG1A1UDj//36zfjr1y8GBoAAFI9BDgAwCMIw+P8Ho3GDO6XQ0l4MN8b2kUwYaLszqgKM/KHcDXwBxAJUD3TJ779A8h9Q5D8SAHoARP36+Rfo41+/mcA2AAQQy49ff0Cu//MPpAeI/0FdA1QNYYNVA/3wmwEYVgwMAAHE8uPHH5BqoD1//gJJLADoJKDS378Z//wFhhJAALF8A3rizz8uTmYg788fJkj4QOKREQyYxSWBhjEC/fcXZANAALF8+/anbcHlHz9+ffvx58uPX9KckkCn/gby/wLd8uvHjx96k+cD1UGiGQgAAgwA7q17ZpsMdUQAAAAASUVORK5CYII="
                            title="Français (fr_FR)" alt="Français"/></a></li>
            </ul>
        </div>
        <br>

        <!--Infos pratiques-->
        <a href="?page_id=168">Infos pratiques</a>

        <!--FORMULAIRE DE RECHERCHE-->
        <form class="formSearch search" method="get" action="" role="search">
            <label class="txt_form">Rechercher</label>
            <input required class="champs_form search-input" type="search" name="s" placeholder="<?php _e( 'Recherche', 'html5blank'	); ?>">
            <input type="image" role="button" src="<?php echo
            get_template_directory_uri(); ?>/img/loupeSearch.png"
                   class="bouton_form search-submit">
            <input type="hidden" name="lang" value="fr" />
        </form>
        <br>


<!--        <form class="search" method="get" action="http://localhost:8080/ON-OFF" role="search">-->
<!--            <input class="search-input" type="search" name="s" placeholder="Recherche">-->
<!--            <button class="search-submit" type="submit" role="button">Recherche</button>-->
<!--            <input type="hidden" name="lang" value="fr" /></form>-->
<!--        -->


        <!--FORMULAIRE DE NEWSLETTER-->
        <div class="widget_wysija_cont html_wysija">
            <div id="msg-form-wysija-html55eb38266eb18-2" class="wysija-msg ajax"></div>
            <form id="form-wysija-html55eb38266eb18-2" method="post" action="#wysija"
                  class="widget_wysija html_wysija">
                <a class="wysija-paragraph">
                    <label>Newsletter <span class="wysija-required"></span></label>

                    <input type="text" name="wysija[user][email]"
                           class="champs_form wysija-input validate[required,custom[email]]" title="E-mail"
                           placeholder="e-mail" value=""/>
    <span class="abs-req">
        <input type="text" name="wysija[user][abs][email]" class="wysija-input validated[abs][email]" value=""/>
    </span>

                </a>
                <input class="wysija-submit wysija-submit-field"
                       src="<?php echo get_template_directory_uri(); ?>/img/newsletterOK.png" type="image"
                       data-toggle="modal" data-target="#myModal"/>

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirmation</h4>
                            </div>
                            <div class="modal-body">
                                <p>Votre adresse email est bien prise en compte, nous vous proposons de vérifier dans
                                    votre boite mail le message de confirmation que nous venons de vous adresser.
                                    .</p>
                                <br>

                                <p>Merci et à très bientôt dans votre boite email.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <input type="hidden" name="form_id" value="2"/>
                <input type="hidden" name="action" value="save"/>
                <input type="hidden" name="controller" value="subscribers"/>
                <input type="hidden" value="1" name="wysija-page"/>
                <input type="hidden" name="wysija[user_list][list_ids]" value="1"/>
            </form>

        </div>

        <!--FORMULAIRE DE NEWSLETTER-->
        <!--        <form action="" class="formSearch">-->
        <!--            <label class="txt_form">Newsletter</label>-->
        <!--            <input type="text" required class="champs_form" placeholder="E-mail">-->
        <!--            <input type="image" src="img/newsletterOK.png" class="bouton_form2">-->
        <!--        </form>-->


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
