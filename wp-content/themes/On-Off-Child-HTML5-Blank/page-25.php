<?php //get_header(); ?>

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

    <!--BLOC 1-->
    <div class="wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/img/Expositions_BG01.png"
             alt="Expositions ON-OFF Studio" class="clearB">

        <div class="titreAT1">
            <h1>EXPOSITIONS</h1>
        </div>

        <!--BLOC ASIDE-->
        <div class="blocAside">
            <h2 class="txtAT02"><span class="txtAT02G">EXPOSITIONS</span> A VENIR</h2>

            <div class="BlocImg">
                <h4 class="txtAT03"><span class="txtAT02G">03 OCT</span> - 12 DEC 2015</h4>
                <h4 class="titreAT04">/--- TECHNIQUES CRÉATIVES ---/</h4>

                <p class="txtAT04">Nunc ut elit non lorem elementum molestie. Fusce ipsum elit, porttitor in
                    cursus
                    eu, suscipit ut lacus. In massa est, commodo a orci non, dapibus tempus </p>
                <h4 class="txtAT03"><span class="txtAT02G">12 JAN</span>- 12 FEV 2016</h4>
                <h4 class="titreAT04">/--- TECHNIQUES CRÉATIVES ---/</h4>

                <p class="txtAT04">Nunc ut elit non lorem elementum molestie. Fusce ipsum elit, porttitor in
                    cursus
                    eu, suscipit ut lacus. In massa est, commodo a orci non, dapibus tempus </p>
                <h4 class="txtAT03"><span class="txtAT02G">13 FEV</span>- 26 MARS 2016</h4>
                <h4 class="titreAT04">/--- TECHNIQUES CRÉATIVES ---/</h4>

                <p class="txtAT04">Nunc ut elit non lorem elementum molestie. Fusce ipsum elit, porttitor in
                    cursus
                    eu, suscipit ut lacus. In massa est, commodo a orci non, dapibus tempus </p>

            </div>
        </div>

        <div class="txtAT1">
            <p>Cras vitae lorem luctus, aliquam ligula in, facilisis neque. Nullam neque nibh, eleifend sit amet
                lectus vitae, varius scelerisque magna. In metus risus, consequat sagittis dapibus vitae,
                interdum
                non nisi. Phasellus non nulla eget nunc pharetra vestibulum nec non leo. Donec sapien justo,
                varius
                vitae rutrum sit amet, gravida sagittis lacus. Nunc ut elit non lorem elementum molestie. Fusce
                ipsum elit, porttitor in cursus eu, suscipit ut lacus. In massa est, commodo a orci non, dapibus
                tempus mi. </p>
        </div>
    </div>


    <!--BLOC 2-->
    <div class="wrapper2">
        <h3 class="titreAT2"><span class="retraitAT1">VOUS.</span><br>/--- RECHERCHEZ UN LIEU POUR ---/<br><span
                class="retraitAT2">VOS ATELIERS OU STAGES ?</span></h3>
        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/Atelier_btn01.png"
                         alt="Bouton contactez-nous" class="btnContact"></a>
    </div>


    <!--BLOC 3-->
    <div class="wrapper3">
        <img src="<?php echo get_template_directory_uri(); ?>/img/trame_bl1_bl2.png" alt="">
        <h4 class="txtAT05"><span class="txtAT05A"><span class="littleTXT">du</span> 07 <span
                    class="littleTXT">au</span> 11</span><span class="txtAT05B">OCT 2016</span><span
                class="txtAT05C">/--- VIA HORIZON ---/</span></h4>

        <div class="BG04">
            <p>Cras vitae lorem luctus, aliquam ligula in, facilisis neque. Nullam neque nibh, eleifend sit amet
                lectus vitae, varius scelerisque magna. In metus risus, consequat sagittis dapibus.</p>
        </div>
    </div>

    <!--BLOC 4-->
    <div class="wrapper4">
        <img src="<?php echo get_template_directory_uri(); ?>/img/trame_bl2_bl3.png" alt="">
        <h4 class="txtAT05"><span class="txtAT05A"><span class="littleTXT">du</span> 13 <span
                    class="littleTXT">au</span> 29</span><span class="txtAT05B">OCT 2016</span><span
                class="txtAT05C">/--- EXPO PICAFLOR ---/</span></h4>

        <div class="BG04">
            <p>Cras vitae lorem luctus, aliquam ligula in, facilisis neque. Nullam neque nibh, eleifend sit amet
                lectus vitae, varius scelerisque magna. In metus risus, consequat sagittis dapibus.</p>
        </div>
        <p class="numFinP">< 1 - 2 - 3 - 4 ></p>
    </div>


    <!--Lien vers mes comamandes JQUERY-->


</body>


<!---->
<!--<div class="col-lg-7 col-md-7 col-sm-7">-->
<!--    <img src="../imgbandeau-evenements.jpg">-->
<!---->
<!--    <h1>-->
<!--        <a href="--><?php //the_permalink(); ?><!--" title="--><?php //the_title(); ?><!--">-->
<?php //the_title(); ?><!--</a>-->
<!--    </h1>-->
<!---->
<!--    <p>--><?php //the_content(); ?><!--</p>-->
<!--    --><?php //the_category('<ul class="category" >Catégories:<li>', '</li><li>', '</li></ul>'); ?>
<!--</div>-->
<!---->
<!--<div class="col-lg-3 col-md-3 col-sm-3">-->
<!--    --><?php //get_sidebar(); ?>
<!--    <p>Test 3 colonnes</p>-->
<!--    --><?php //get_sidebar(); ?>
<!---->
<!--    <h1>--><?php //echo (has_post_format('video')) ? '<span class="post__video">[video]</span>' : ''; ?>
<!--</div>-->
<!--</div>-->
<!--</div>-->

<?php get_footer(); ?>
