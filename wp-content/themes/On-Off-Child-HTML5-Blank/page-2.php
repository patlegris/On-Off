<?php get_header(); ?>

<body>
<div class="container-fluid">
    <div class="row">
         nav
        <div class="col-lg-2 col-md-2 col-sm-2">
            <nav class="navbar" role="navigation">
                <div id="container" class="container-fluid">
                    <div class="navbar-header navbar-default">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar"
                                aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Navigation</span>
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

                        <?php html5blank_nav(); ?>
                        <!--                                    --><?php //wp_nav_menu(); ?>

                        <img src="<?php echo get_template_directory_uri(); ?>./img/provisoire.png"
                             class="img-thumbnail">

                        <!-- Search form-->
                        <ul class="">
                            <li>
                                <form class="navbar-form"
                                      method='get' ,
                                      id='searchform'
                                      action='http://localhost:8080/ON-OFF/'
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
        </div>
        </nav>

        <div class="col-lg-7 col-md-7 col-sm-7">
            <!--            <div class="container">-->
            <h1><?php single_post_title(); ?></h1>
            <?php get_template_part('loop'); ?>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3">
            <?php get_sidebar(); ?>
            <p>Test 3 colonnes</p>
        </div>
    </div>
    <!--<div id="container" class="container">-->
    <!--    <div class="row">-->
    <!---->
    <!--    </div>-->
    <!--</div>-->

</div>
</body>

<?php get_footer(); ?>

