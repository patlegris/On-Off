<?php get_header(); ?>

<div class="container">
    <div class="col-lg-7">
        <?php get_template_part('loop-event'); ?>

    </div>
</div>

<div class="container">
    <div class="col-lg-3">
        <?php get_sidebar(); ?>
        <p>Test 3 colonnes</p>
    </div>
</div>

<?php get_footer(); ?>
