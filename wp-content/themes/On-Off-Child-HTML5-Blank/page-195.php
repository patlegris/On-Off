<?php get_header(); ?>


<!--SCRIPT ASIDE FIXE-->
<script>
    window.onscroll = function () {
        var scroll = (document.documentElement.scrollTop ||
        document.body.scrollTop);
        if (scroll > 30)
            document.getElementsByClassName('blocAside').style.fixedtop = scroll + 'px';
    }
</script>

<!--BLOC 1-->
<div class="wrapper">
    <img src="<?php echo get_template_directory_uri(); ?>/img/Artistes-types_BG01.jpg" alt="Un véritable artiste comme dans les films" class="clearB">
</div>


</body>


<!---->
<!--<div class="col-lg-7 col-md-7 col-sm-7">-->
<!--    <img src="../imgbandeau-evenements.jpg">-->
<!---->
<!--    <h1>-->
<!--        <a href="--><?php //the_permalink(); ?><!--" title="--><?php //the_title(); ?><!--">-->
<?php //the_title(); ?><!--</a>-->
<!--    </h1>-->
<!---->
<!--    <p>--><?php //the_content(); ?><!--</p>-->
<!--    --><?php //the_category('<ul class="category" >Catégories:<li>', '</li><li>', '</li></ul>'); ?>
<!--</div>-->
<!---->
<!--<div class="col-lg-3 col-md-3 col-sm-3">-->
<!--    --><?php //get_sidebar(); ?>
<!--    <p>Test 3 colonnes</p>-->
<!--    --><?php //get_sidebar(); ?>
<!---->
<!--    <h1>--><?php //echo (has_post_format('video')) ? '<span class="post__video">[video]</span>' : ''; ?>
<!--</div>-->
<!--</div>-->
<!--</div>-->

<?php get_footer(); ?>
