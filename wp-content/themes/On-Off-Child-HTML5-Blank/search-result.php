<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <!-- post thumbnail -->
        <?php if (has_post_thumbnail()) : // Check if thumbnail exists ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            </a>
        <?php endif; ?>

        <!--BLOC 4-->
        <div class="wrapper5">
            <h4 class="txtAT05C2">
                /--- <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> ---/
            </h4>
            <br>

            <!-- post title -->
            <?php the_post_thumbnail('medium'); // Declare pixel size you need inside the array ?><br><br>
            <!-- /post details -->
            <a class="txtPad01"><?php html5wp_excerpt('html5wp_index'); ?></a>
            <!--BOUTON DYNAMIQUE-->
<!--            <div class="post-tag3">-->
<!--                    <span class="arrow-btn post-tag-arrow">-->
<!--                    <i class="arrow-btn-icon jaa-icon-arrow-right post-tag-arrow-icon"></i>-->
<!--                    <span class="arrow-btn-circle post-tag-arrow-circle"></span>-->
<!--                    <span class="arrow-btn-text post-tag-arrow-text"><a href="expositions-type.html">EN SAVOIR-->
<!--                            +</a></span>-->
<!--                    </span>-->
<!--            </div>-->
            <br>

            <p class="date">Article publié le <?php the_time('j F Y'); ?></p><br><br><br>
            <!--BOUTON DYNAMIQUE-->
            <div class="post-tag">

<!--                </span>-->
            </div>
        </div>

        <!--            --><?php //edit_post_link(); ?>

    </article>

    <!-- /article -->

<?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article>
        <h2><?php _e("Désolé, il n'y a pas de contenu.", 'html5blank'); ?></h2>
    </article>
    <!-- /article -->

<?php endif; ?>
