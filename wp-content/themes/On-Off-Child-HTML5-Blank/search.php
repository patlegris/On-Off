<?php get_header(); ?>

<!--BLOC 1-->
<div class="wrapper">
    <img src="<?php echo get_template_directory_uri(); ?>/img/recherche.jpg" alt="Expositions ON-OFF Studio"
         class="clearB">

    <div class="titreAT1">
        <h1>Votre recherche</h1>
    </div>
    <!-- section -->
    <section>

        <h3 class="txtAT05C2">/--- <?php echo sprintf(__('%s Search Results for ', 'html5blank'),
                $wp_query->found_posts);
            echo get_search_query(); ?> ---/</h3>

        <?php get_template_part('search-result'); ?>

        <h4 class="txtAT05C2"><?php get_template_part('pagination'); ?></h4>

    </section>

</div>


<?php //get_sidebar(); ?>

<?php get_footer(); ?>
