<?php get_header(); ?>

<div class="container">
    <div class="col-md-7">
        <img src="img/bandeau-evenements.jpg">

        <h1>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </h1>

        <p><?php the_content(); ?></p>
        <?php the_category('<ul class="category" >Catégories:<li>', '</li><li>', '</li></ul>'); ?>


    </div>
</div>

<div class="container">
    <div class="col-md-2">
        <?php get_sidebar(); ?>
        <p>Test 3 colonnes</p>

        <h1><?php echo (has_post_format('video')) ? '<span class="post__video">[video]</span>' : ''; ?>
    </div>
</div>

<?php get_footer(); ?>
