<?php get_header(); ?>

<div class="col-lg-7 col-md-7 col-sm-7">
    <img src="img/bandeau-evenements.jpg">

    <h1>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    </h1>

    <p><?php the_content(); ?></p>
    <?php the_category('<ul class="category" >Catégories:<li>', '</li><li>', '</li></ul>'); ?>
</div>

<div class="col-lg-3 col-md-3 col-sm-3">
    <?php get_sidebar(); ?>
    <p>Test 3 colonnes</p>
    <?php get_sidebar(); ?>

    <h1><?php echo (has_post_format('video')) ? '<span class="post__video">[video]</span>' : ''; ?>
</div>
</div>
</div>

<?php get_footer(); ?>
