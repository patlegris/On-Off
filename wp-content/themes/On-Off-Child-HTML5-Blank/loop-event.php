<?php if (have_posts()): ?>
    <section class="page">
        <?php while (have_posts()): the_post(); ?>
            <section <?php echo (is_sticky()) ? 'class="post__sticky"' : ''; ?> >
                <!--                --><?php //if (has_post_thumbnail()): ?>
                <!--                    <a href="--><?php //the_permalink(); ?><!--">-->
                <!--                        --><?php //the_post_thumbnail('large', ['class' => 'post__img-thumbnail post__pull-left',]); ?>
                <!--                    </a>-->
                <!--                --><?php //endif; ?>
                <img src="/img/bandeau-evenements.jpg">
                <h1><?php echo (has_post_format('video')) ? '<span class="post__video">[video]</span>' : ''; ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

                <p><?php the_content(); ?></p>
                <?php the_category(); ?>
                <?php the_tags('<ul class="post__tag" >mot(s) clef(s):<li>', '</li><li>', '</li></ul>'); ?>
                <?php the_terms($post->ID, 'country', '<ul class="post__tax" >pays:<li>', '</li><li>', '</li></ul>'); ?>
                <?php the_terms($post->ID, 'genre', '<ul class="post__tax" >pays:<li>', '</li><li>', '</li></ul>'); ?>
                <?php the_author_posts_link(); ?>
            </section>
        <?php endwhile; ?>
    </section>
<?php else: ?>
    <p>Désolé pas d'article pour le moment...</p>
<?php endif; ?>