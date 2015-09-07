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
            <!--            <div class="blocASS1">-->
            <!--                <h4 class="txtAT05C2">/--- BLANC TITANE ---/</h4>-->

            <h4 class="txtAT05C2">
                /--- <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> ---/
            </h4>
            <br>
            <!-- /post title -->


            <!-- post details -->
            <?php //the_time('g:i a'); ?><!--</span>-->
            <!--        <span class="author">--><?php //_e('Published by', 'html5blank'); ?><!---->
            <?php //the_author_posts_link(); ?><!--</span>-->
            <!--        <span-->
            <!--            class="comments">-->
            <?php //if (comments_open(get_the_ID())) comments_popup_link(__('Leave your thoughts', 'html5blank'), __('1 Comment', 'html5blank')); ?><!--</span>-->

            <!--            <p class="txtPad01">Lieu d’expérimentation, la Galerie des Galeries continue ici à imaginer de nouvelles-->
            <!--                formes-->
            <!--                d’expositions et invite des contributeurs issus de différents champs créatifs à penser ensemble un-->
            <!--                projet-->
            <!--                qui interroge l’art, la mode et le design. Le visiteur se retrouve au sein d’une circulation-->
            <!--                particulière-->
            <!--                dont le point de départ est toujours l’oeuvre.-->
            <!--                <br></p>-->

            <!-- post title -->
            <?php the_post_thumbnail('medium'); // Declare pixel size you need inside the array ?><br><br>
            <!-- /post details -->
            <a class="txtPad01"><?php html5wp_excerpt('html5wp_index'); ?></a><br>
                    <p class="date">Publié le <?php the_time('j F Y'); ?></p><br><br><br>
            <!--BOUTON DYNAMIQUE-->
            <div class="post-tag">
<!--                    <span class="arrow-btn post-tag-arrow">-->
<!--                    <i class="arrow-btn-icon jaa-icon-arrow-right post-tag-arrow-icon"></i>-->
<!--                    <span class="arrow-btn-circle post-tag-arrow-circle"></span>-->
<!--                    <span class="arrow-btn-text post-tag-arrow-text"><a href="--><?php //the_permalink(); ?><!--"-->
<!--                            >EN SAVOIR-->
<!--                            +</a></span>-->
                    </span>
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
