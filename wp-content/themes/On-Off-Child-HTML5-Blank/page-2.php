<?php get_header(); ?>

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

