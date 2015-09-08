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

<div class="WhiteMenu" id="">
    <!--Logo On-Off insertion-->
    <div class="logo">
        <a href="<?php echo home_url(); ?>./">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo-on-off.svg" alt="Logo On-Off"
                 class="logo-img"></a>
    </div>

    <!--Menu accordion, over/active button bootstrap style modified-->
    <div id="MainMenu">
        <ul class="list-group panel">
            <li><a href="#SubMenu1" class="list-group-item
                            list-group-item-success"
                   data-toggle="collapse"
                   data-parent="#MainMenu">Le lieu <b class="caret"></b></a></li>


            <div class="collapse list-group-submenu" id="SubMenu1">
                <li><a href="?page_id=2" class="list-group-item"
                       data-parent="#SubMenu1">L'espace On-Off</a></li>
                <!--                    <li><a href="?page_id=37" class="list-group-item"-->
                <!--                           data-parent="#SubMenu1">L'espace On-Off</a></li>-->
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
                   data-parent="#MainMenu">Privatisation <b class="caret"></b></a></li>

            <div class="collapse list-group-submenu" id="SubMenu2">
                <li><a href="?page_id=88" class="list-group-item"
                       data-parent="#SubMenu2">Privatisez</a></li>
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

        <!--            --><?php //get_sidebar(); ?>

        <!--    Langues-->
        <div class="sidebar-widget">
            <div id="polylang-2" class="widget_polylang">
                <ul>
                    <a class="lang-item lang-item-16 lang-item-fr current-lang"><a hreflang="fr"
                                                                                   href="http://localhost:8080/ON-OFF/?lang=fr"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAGzSURBVHjaYiyeepkBBv79+Zfnx/f379+fP38CyT9//jAyMiq5GP77wvDnJ8MfoAIGBoAAYgGqC7STApL///3/9++/pCTv////Qdz/QO4/IMna0vf/z+9/v379//37bUUTQACBNDD8Z/j87fffvyAVX79+/Q8GQDbQeKA9fM+e/Pv18/+vnwzCIkBLAAKQOAY5AIAwCEv4/4PddNUm3ji0QJyxW3rgzE0iLfqDGr2oYuu0l54AYvnz5x9Q6d+/QPQfyAQqAin9B3EOyG1A1UDj//36zfjr1y8GBoAAFI9BDgAwCMIw+P8Ho3GDO6XQ0l4MN8b2kUwYaLszqgKM/KHcDXwBxAJUD3TJ779A8h9Q5D8SAHoARP36+Rfo41+/mcA2AAQQy49ff0Cu//MPpAeI/0FdA1QNYYNVA/3wmwEYVgwMAAHE8uPHH5BqoD1//gJJLADoJKDS378Z//wFhhJAALF8A3rizz8uTmYg788fJkj4QOKREQyYxSWBhjEC/fcXZANAALF8+/anbcHlHz9+ffvx58uPX9KckkCn/gby/wLd8uvHjx96k+cD1UGiGQgAAgwA7q17ZpsMdUQAAAAASUVORK5CYII="
                                title="Français (fr_FR)" alt="Français"/></a></a>
                    <a class="lang-item lang-item-30 lang-item-en"><a hreflang="en"
                                                                      href="http://localhost:8080/ON-OFF/?lang=en"><img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAIAAAD5gJpuAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAflJREFUeNpinDRzn5qN3uFDt16+YWBg+Pv339+KGN0rbVP+//2rW5tf0Hfy/2+mr99+yKpyOl3Ydt8njEWIn8f9zj639NC7j78eP//8739GVUUhNUNuhl8//ysKeZrJ/v7z10Zb2PTQTIY1XZO2Xmfad+f7XgkXxuUrVB6cjPVXef78JyMjA8PFuwyX7gAZj97+T2e9o3d4BWNp84K1NzubTjAB3fH0+fv6N3qP/ir9bW6ozNQCijB8/8zw/TuQ7r4/ndvN5mZgkpPXiis3Pv34+ZPh5t23//79Rwehof/9/NDEgMrOXHvJcrllgpoRN8PFOwy/fzP8+gUlgZI/f/5xcPj/69e/37//AUX+/mXRkN555gsOG2xt/5hZQMwF4r9///75++f3nz8nr75gSms82jfvQnT6zqvXPjC8e/srJQHo9P9fvwNtAHmG4f8zZ6dDc3bIyM2LTNlsbtfM9OPHH3FhtqUz3eXX9H+cOy9ZMB2o6t/Pn0DHMPz/b+2wXGTvPlPGFxdcD+mZyjP8+8MUE6sa7a/xo6Pykn1s4zdzIZ6///8zMGpKM2pKAB0jqy4UE7/msKat6Jw5mafrsxNtWZ6/fjvNLW29qv25pQd///n+5+/fxDDVbcc//P/zx/36m5Ub9zL8+7t66yEROcHK7q5bldMBAgwADcRBCuVLfoEAAAAASUVORK5CYII="
                                title="English (en_GB)" alt="English"/></a></a>
                </ul>
            </div>
        </div>
        <br>

        <!--Infos pratiques-->
        <a href="?page_id=168">Infos pratiques</a>

        <!--FORMULAIRE DE RECHERCHE-->
        <form class="formSearch search" method="get" action="" role="search">
            <label class="txt_form">Rechercher</label>
            <input required class="champs_form search-input" type="search" name="s"
                   placeholder="<?php _e('Recherche', 'html5blank'); ?>">
            <input type="image" role="button" src="<?php echo
            get_template_directory_uri(); ?>/img/loupeSearch.png"
                   class="bouton_form search-submit">
            <input type="hidden" name="lang" value="fr"/>
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
                                <p>Votre adresse email est bien prise en compte, nous vous proposons de vérifier
                                    dans votre boite mail le message de confirmation que nous venons de vous
                                    adresser.</p>
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
        <a href="?page_id=191">Crédits </a>/
        <a href="?page_id=189"> Mentions légales</a>
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
                        <a href="?page_id=2" class="button" onclick="mainslider.nextSlide();">Le lieu</a>
                    </div>
                </div>
            </div>

            <div class='slide' id="thirth">
                <div class='slidecontent'>
                    <div class="text">
                        <a href="?page_id=25" class="button" onclick="mainslider.nextSlide();">Les expositions</a>
                    </div>
                </div>
            </div>

            <div class='slide' id="sec">
                <div class='slidecontent'>
                    <div class="text">
                        <a href="?page_id=83" class="button" onclick="mainslider.nextSlide();">Ateliers / Stages</a>
                    </div>
                </div>
            </div>
            <div class='slide' id="fifth">
                <div class='slidecontent'>
                    <div class="text">
                        <a href="?page_id=79" class="button" onclick="mainslider.nextSlide();">Evènements</a>
                    </div>
                </div>
            </div>
            <div class='slide' id="fourth">
                <div class='slidecontent'>
                    <div class="text">
                        <a href="?page_id=88" class="button" onclick="mainslider.nextSlide();">Privatisez l'espace</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--                --><?php //html5blank_nav(); ?>



<?php get_footer(); ?>

