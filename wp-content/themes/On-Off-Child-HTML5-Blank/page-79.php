<?php //get_header(); ?>

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
<!-- nav -->
<nav class="navbar navbar-default col-lg-2" role="navigation">
    <div id="container" class="container">
        <div class="row"
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse nav navbar-collapse bar-menu navbar-left col-lg-2" id="example-navbar-collapse">

            <!--Logo On-Off insertion-->
            <div class="logo">
                <a href="<?php echo home_url(); ?>./">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-on-off.svg" alt="Logo"
                         class="logo-img"></a>
            </div>

            <ul id="menu-menu" class="menu">
                <li id="menu-item-33"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-33">
                    <a href="http://localhost:8080/ON-OFF/?page_id=2">Le lieu</a>
                    <ul class="sub-menu">
                        <li id="menu-item-42"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-42"><a
                                href="http://localhost:8080/ON-OFF/?page_id=37">L&rsquo;espace On-Off</a></li>
                        <li id="menu-item-69"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-69"><a
                                href="http://localhost:8080/ON-OFF/?page_id=64">L&rsquo;association</a></li>
                    </ul>
                </li>
                <li id="menu-item-36" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a
                        href="http://localhost:8080/ON-OFF/?page_id=25">Expositions</a></li>
                <li id="menu-item-85" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-85"><a
                        href="http://localhost:8080/ON-OFF/?page_id=76">Nos artistes</a></li>
                <li id="menu-item-86" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-86"><a
                        href="http://localhost:8080/ON-OFF/?page_id=79">Événements</a></li>
                <li id="menu-item-87" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-87"><a
                        href="http://localhost:8080/ON-OFF/?page_id=83">Ateliers / Stages</a></li>
                <li id="menu-item-106"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-106">
                    <a href="http://localhost:8080/ON-OFF/?page_id=88">Privatisation</a>
                    <ul class="sub-menu">
                        <li id="menu-item-105"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-105"><a
                                href="http://localhost:8080/ON-OFF/?page_id=95">Le Studio</a></li>
                        <li id="menu-item-104"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-104"><a
                                href="http://localhost:8080/ON-OFF/?page_id=97">Les CGV</a></li>
                        <li id="menu-item-103"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-103"><a
                                href="http://localhost:8080/ON-OFF/?page_id=99">Les tarifs</a></li>
                    </ul>
                </li>
                <li id="menu-item-150" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-150"><a
                        href="http://localhost:8080/ON-OFF/?page_id=148">Contact</a></li>
            </ul>


            <!--            --><?php //html5blank_nav(); ?>

            <!--            <img src="--><?php //echo get_template_directory_uri(); ?><!--./img/provisoire.png"-->
            <!--                 class="img-thumbnail">-->

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


<div class="col-lg-7 col-md-7 col-sm-7">
    <!--            <div class="container">-->
    <!--            <h1>--><?php //single_post_title(); ?><!--</h1>-->
    <?php get_template_part('loop-event'); ?>
</div>

<div class="col-lg-3 col-md-3 col-sm-3">
    <?php get_sidebar(); ?>
    <p>Test 3 colonnes</p>
</div>

<?php get_footer(); ?>
