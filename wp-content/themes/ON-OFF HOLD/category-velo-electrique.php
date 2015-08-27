<?php get_header(); ?>
<div class="main-container">
    <div class="main wrapper clearfix">
        <h1>Category template spécifique --> <?php single_cat_title() ?></h1>
        <?php get_template_part('loop', 'excerpt'); ?> <!-- loop-excerpt-->
        <aside>
            <?php get_sidebar(); ?>
        </aside>
    </div>
    <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer(); ?>
