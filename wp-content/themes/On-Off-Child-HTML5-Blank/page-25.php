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
    <img src="<?php echo get_template_directory_uri(); ?>/img/Expositions_BG01.png" alt="Expositions ON-OFF Studio"
         class="clearB">

    <div class="titreAT1">
        <h1>EXPOSITIONS</h1>
    </div>


    <!--BLOC ASIDE-->
    <div class="blocAside">
        <h2 class="txtAT02"><span class="txtAT02G">EXPOSITIONS</span> A VENIR</h2>

        <div class="BlocImg">
            <h4 class="txtAT03"><span class="txtAT02G">03 OCT</span> - 12 DEC 2015</h4>
            <h4 class="titreAT04">/--- TECHNIQUES CRÉATIVES ---/</h4>

            <p class="txtAT04">Nunc ut elit non lorem elementum molestie. Fusce ipsum elit, porttitor in cursus eu,
                suscipit ut lacus. In massa est, commodo a orci non, dapibus tempus </p>
            <h4 class="txtAT03"><span class="txtAT02G">12 JAN</span>- 12 FEV 2016</h4>
            <h4 class="titreAT04">/--- TECHNIQUES CRÉATIVES ---/</h4>

            <p class="txtAT04">Nunc ut elit non lorem elementum molestie. Fusce ipsum elit, porttitor in cursus eu,
                suscipit ut lacus. In massa est, commodo a orci non, dapibus tempus </p>
            <h4 class="txtAT03"><span class="txtAT02G">13 FEV</span>- 26 MARS 2016</h4>
            <h4 class="titreAT04">/--- TECHNIQUES CRÉATIVES ---/</h4>

            <p class="txtAT04">Nunc ut elit non lorem elementum molestie. Fusce ipsum elit, porttitor in cursus eu,
                suscipit ut lacus. In massa est, commodo a orci non, dapibus tempus </p>

        </div>
    </div>

    <div class="txtAT1">
        <p>Cras vitae lorem luctus, aliquam ligula in, facilisis neque. Nullam neque nibh, eleifend sit amet lectus
            vitae, varius scelerisque magna. In metus risus, consequat sagittis dapibus vitae, interdum non nisi.
            Phasellus non nulla eget nunc pharetra vestibulum nec non leo. Donec sapien justo, varius vitae rutrum sit
            amet, gravida sagittis lacus. Nunc ut elit non lorem elementum molestie. Fusce ipsum elit, porttitor in
            cursus eu, suscipit ut lacus. In massa est, commodo a orci non, dapibus tempus mi. </p>
    </div>
</div>


<!--BLOC 2-->
<div class="wrapper2">
    <h3 class="titreAT2"><span class="retraitAT1">VOUS.</span><br>/--- ÊTES ARTISTE ET SOUHAITEZ ---/<br><span
            class="retraitAT2">EXPOSER ?</span></h3>

    <!--BOUTON DYNAMIQUE-->
    <div class="post-tag2">
               <span class="arrow-btn post-tag-arrow">
                    <i class="arrow-btn-icon jaa-icon-arrow-right post-tag-arrow-icon"></i>
                    <span class="arrow-btn-circle post-tag-arrow-circle"></span>
                    <span class="arrow-btn-text2 post-tag-arrow-text"><a href="?page_id=148&lang=fr">CONTACTEZ-NOUS</a></span>
                </span>
    </div>

</div>


<!--BLOC 3-->
<div class="wrapper3">
    <img src="<?php echo get_template_directory_uri(); ?>/img/trame_bl1_bl2.png" alt="">
    <h4 class="txtAT05"><span class="txtAT05A"><span class="littleTXT">du</span> 07 <span class="littleTXT">au</span> 11</span><span
            class="txtAT05B">OCT 2016</span><span class="txtAT05C">/--- VIA HORIZON ---/</span></h4>

    <div class="BG04">
        <p>Cras vitae lorem luctus, aliquam ligula in, facilisis neque. Nullam neque nibh, eleifend sit amet lectus
            vitae, varius scelerisque magna. In metus risus, consequat sagittis dapibus.</p>

        <!--BOUTON DYNAMIQUE-->
        <div class="post-tag3">
                    <span class="arrow-btn post-tag-arrow">
                    <i class="arrow-btn-icon jaa-icon-arrow-right post-tag-arrow-icon"></i>
                    <span class="arrow-btn-circle post-tag-arrow-circle"></span>
                    <span class="arrow-btn-text post-tag-arrow-text"><a href="expositions-type.html">EN SAVOIR
                            +</a></span>
                    </span>
        </div>
    </div>
</div>

<!--BLOC 4-->
<div class="wrapper4">
    <img src="<?php echo get_template_directory_uri(); ?>/img/trame_bl2_bl3.png" alt="">
    <h4 class="txtAT05"><span class="txtAT05A"><span class="littleTXT">du</span> 13 <span class="littleTXT">au</span> 29</span><span
            class="txtAT05B">OCT 2016</span><span class="txtAT05C">/--- EXPO PICAFLOR ---/</span></h4>

    <div class="BG04">
        <p>Cras vitae lorem luctus, aliquam ligula in, facilisis neque. Nullam neque nibh, eleifend sit amet lectus
            vitae, varius scelerisque magna. In metus risus, consequat sagittis dapibus.</p>

        <!--BOUTON DYNAMIQUE-->
        <div class="post-tag3">
                    <span class="arrow-btn post-tag-arrow">
                    <i class="arrow-btn-icon jaa-icon-arrow-right post-tag-arrow-icon"></i>
                    <span class="arrow-btn-circle post-tag-arrow-circle"></span>
                    <span class="arrow-btn-text post-tag-arrow-text"><a href="expositions-type.html">EN SAVOIR
                            +</a></span>
                    </span>
        </div>

    </div>
    <p class="numFinP">< 1 - 2 - 3 - 4 ></p>
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
