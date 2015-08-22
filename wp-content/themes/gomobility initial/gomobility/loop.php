<?php If (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <?php the_category(); ?>
    <?php endwhile; ?>
<?php else: ?>
    <p > Désolé pas d'articles pour l'instant...</p >
<?php Endif; ?>
