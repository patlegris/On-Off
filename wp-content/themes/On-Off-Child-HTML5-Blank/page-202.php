<?php get_header(); ?>

<!--BLOC 1-->
<div class="wrapper">
    <img src="<?php echo get_template_directory_uri(); ?>/img/Expositions-type_BG01.png" alt="Exposition ON-OFF Studio" class="clearB">

    <div class="titreAT1">
        <h1>FORÊT DANSANTE</h1>
    </div>

    <!--BLOC ASIDE-->
    <div class="blocAside">
        <h2 class="txtAT02"><span class="txtAT02G">L'ARTISTE</span></h2>

        <div class="BlocImg">
            <img src="<?php echo get_template_directory_uri(); ?>/img/Expositions-type_AS01.png" alt="Exposition">
            <h4 class="txtAT03"><span class="txtAT02G">BIOGRAPHIE</span></h4>
            <h4 class="titreAT04">/--- MONIQUE VALLAT ---/</h4>

            <p class="txtAT04">Nunc ut elit non lorem elementum molestie. Fusce ipsum elit, porttitor in cursus eu,
                suscipit ut lacus. In massa est, commodo a orci non, dapibus tempus </p>
            <!--BOUTON DYNAMIQUE-->
            <div class="post-tag4">
                    <span class="arrow-btn post-tag-arrow">
                    <i class="arrow-btn-icon jaa-icon-arrow-right post-tag-arrow-icon"></i>
                    <span class="arrow-btn-circle post-tag-arrow-circle"></span>
                    <span class="arrow-btn-text post-tag-arrow-text"><a href="artistes-type.html">EN SAVOIR +</a></span>
                    </span>
            </div>
        </div>
    </div>

    <div class="txtAT1">
        <p>Cras vitae lorem luctus, aliquam ligula in, facilisis neque. Nullam neque nibh, eleifend sit amet lectus
            vitae, varius scelerisque magna. In metus risus, consequat sagittis dapibus vitae, interdum non nisi.
            Phasellus non nulla eget nunc pharetra vestibulum nec non leo. Donec sapien justo, varius vitae rutrum sit
            amet, gravida sagittis lacus.</p>
    </div>
</div>


<!--BLOC 2-->
<div class="wrapper2">
    <h3 class="titreAT2"><span class="retraitAT1">VOUS.</span><br>/--- ÊTES ARTISTES ET SOUHAITEZ ---/<br><span
            class="retraitAT2">EXPOSER ?</span></h3>

    <!--BOUTON DYNAMIQUE-->
    <div class="post-tag2">
               <span class="arrow-btn post-tag-arrow">
                    <i class="arrow-btn-icon jaa-icon-arrow-right post-tag-arrow-icon"></i>
                    <span class="arrow-btn-circle post-tag-arrow-circle"></span>
                    <span class="arrow-btn-text2 post-tag-arrow-text"><a href="contact.html">CONTACTEZ-NOUS</a></span>
                </span>
    </div>


</div>


<!--BLOC 3-->
<div class="wrapper3">
    <img src="<?php echo get_template_directory_uri(); ?>/img/trame_bl1_bl2.png" alt="">
    <h4 class="txtAT06"><span class="txtAT06C">/--- L'EXPOSITION FORÊT DANSANTE ---/</span></h4>

    <div class="BG10">

    </div>
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
