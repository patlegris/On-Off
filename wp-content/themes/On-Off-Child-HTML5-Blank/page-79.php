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
    <img src="<?php echo get_template_directory_uri(); ?>/img/Evenements_BG01.png" alt="Atelier ON-OFF Studio"
         class="clearB">

    <div class="titreAT1">
        <h1>ÉVÉNEMENTS</h1>
    </div>

    <!--BLOC ASIDE-->
    <div class="blocAside">
        <h2 class="txtAT02"><span class="txtAT02G">FIL D'ACTU</span>ALITÉ SOCIAL</h2>

        <div class="BlocImg">
            <img src="<?php echo get_template_directory_uri(); ?>/img/Bloc_Facebook.png" alt="Facebook"
                 class="BlocImgBas">
        </div>
        <div class="BlocImg2">
            <img src="<?php echo get_template_directory_uri(); ?>/img/Bloc_Instagram..png" alt="Instagram"
                 class="BlocImgBas">
        </div>
    </div>
    <div class="txtAT1">
        <p>Cras vitae lorem luctus, aliquam ligula in, facilisis neque. Nullam neque nibh, eleifend sit amet lectus
            vitae, varius scelerisque magna. In metus risus, consequat sagittis dapibus vitae, interdum non nisi.
            Phasellus non nulla eget nunc pharetra vestibulum nec non leo. Donec sapien justo, varius vitae rutrum sit
            amet, gravida sagittis lacus.Cras vitae lorem luctus, aliquam ligula in, facilisis neque. Nullam neque nibh,
            eleifend sit amet lectus vitae, varius scelerisque magna. In metus risus, consequat sagittis dapibus vitae,
            interdum non nisi. Phasellus non nulla eget nunc pharetra vestibulum nec non leo. Donec sapien justo, varius
            vitae rutrum sit amet, gravida sagittis lacus.</p>
    </div>
</div>

<!--BLOC 3-->
<div class="wrapper3">
    <h4 class="txtAT05"><span class="txtAT05A">08</span><span class="txtAT05B">OCT 2015</span><span
            class="txtAT05C">/--- SOIRÉE THÉMATIQUE ---/</span>
    </h4>

    <div class="BG06">
        <p>L’association “La glaise à gogo” organise un stage de sculpture du 13 au 26 mars au On-Off studio. Pour
            tout
            renseignement veuillez les contacter par mail ou sur leur site.</p>

        <!--BOUTON DYNAMIQUE-->
        <div class="post-tag3">
                    <span class="arrow-btn post-tag-arrow">
                    <i class="arrow-btn-icon jaa-icon-arrow-right post-tag-arrow-icon"></i>
                    <span class="arrow-btn-circle post-tag-arrow-circle"></span>
                    <span class="arrow-btn-text post-tag-arrow-text"><a href="evenements-type.html">EN SAVOIR
                            +</a></span>
                    </span>
        </div>

    </div>
</div>

<!--BLOC 4-->
<div class="wrapper4">
    <img src="<?php echo get_template_directory_uri(); ?>/img/trame_bl2_bl3.png" alt="Artiste citoyen urbain"
         class="">
    <h4 class="txtAT05"><span class="txtAT05A">03</span><span class="txtAT05B">NOV 2015</span><span
            class="txtAT05C">/--- l’ARTISTE CITOYEN URBAIN --/</span>
    </h4>

    <div class="BG06">
        <p>L’association “La glaise à gogo” organise un stage de sculpture du 13 au 26 mars au On-Off studio. Pour
            tout
            renseignement veuillez les contacter par mail ou sur leur site.</p>

        <!--BOUTON DYNAMIQUE-->
        <div class="post-tag3">
                    <span class="arrow-btn post-tag-arrow">
                    <i class="arrow-btn-icon jaa-icon-arrow-right post-tag-arrow-icon"></i>
                    <span class="arrow-btn-circle post-tag-arrow-circle"></span>
                    <span class="arrow-btn-text post-tag-arrow-text"><a href="evenements-type.html">EN SAVOIR
                            +</a></span>
                    </span>
        </div>
    </div>
    <p class="numFinP">< 1 - 2 - 3 - 4 ></p>
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
