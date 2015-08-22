<?php If (have_posts()): ?>
    <article class="post">
        <?php while (have_posts()): the_post(); ?>
            <section>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2>
                <p><?php the_excerpt(); ?></p>
            </section>
            <?php the_category(); ?>
        <?php endwhile; ?>
    </article>
<?php else: ?>
    <p> Désolé pas d'articles pour l'instant...</p>
<?php Endif; ?>
