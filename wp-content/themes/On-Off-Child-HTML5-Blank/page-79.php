<?php get_header(); ?>

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
