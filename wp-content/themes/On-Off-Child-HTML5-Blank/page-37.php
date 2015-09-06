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
    <img src="<?php echo get_template_directory_uri(); ?>/img/LeLieu_BG01.png" alt="Expositions ON-OFF Studio" class="clearB">

    <div class="titreAT1">
        <h1>LE STUDIO ON-OFF</h1>
    </div>

    <!--BLOC ASIDE-->
    <div class="blocAside">
        <h2 class="txtAT02"><span class="txtAT02G">INFORMATIONS</span></h2>

        <div class="BlocImg">
            <h4 class="titreAT04 BRTOP15">/--- DÉTAILS TECHNIQUES ---/</h4>

            <p class="txtAT04">Nunc ut elit non lorem elementum molestie. Fusce ipsum elit, porttitor in cursus eu,
                suscipit ut lacus. In massa est, commodo a orci non, dapibus tempus mil ut lacus. In massa est, commodo
                a orci.</p>

            <p class="txtAT04">Nunc ut elit non lorem elementum molestie. Fusce ipsum elit, porttitor in cursus eu,
                suscipit ut lacus massa dapibus. Fusce ipsum elit, porttitor in cursus eu, suscipit ut lacus.</p>

        </div>
    </div>

    <div class="txtAT1">
        <p>Cras vitae lorem luctus, aliquam ligula in, facilisis neque. Nullam neque nibh, eleifend sit amet lectus
            vitae, varius scelerisque magna. In metus risus, consequat sagittis dapibus vitae, interdum non nisi.
            Phasellus non nulla eget nunc pharetra vestibulum nec non leo. Donec sapien justo, varius vitae rutrum sit
            amet, gravida sagittis lacus. Nunc ut elit non lorem elementum molestie. Fusce ipsum elit, porttitor in
            cursus eu, suscipit ut lacus. In massa est, commodo a orci non, dapibus tempus mi. </p>
    </div>
    <span class="txtAT05C2">/--- L'ESPACE ON-OFF ---/</span>

    <div class="BG02">
        <p>Espace d’échanges artistique et culturelle, us, iquam ligula in, facilisis neque. Nullam neque nibh, eleifend
            sit amet lectus vitae, varius. Ras vitae lorem luctus, aliquam ligula in, facilisis neque. Nullam neque
            nibh, eleifend sit amet lectus vitae, varius scelerisque magna. In metus risus, consequat sagittis dapibus
            vitae, interdum non nisi. Phasellus non nulla eget nunc pharetra vestibulum nec non leo. Donec sapien justo,
            varius vitae rutrum sit amet, gravida sagittis lacus. Nunc ut elit non lorem elementum molestie. Fusce ipsum
            elit, porttitor in cursus eu, suscipit ut lacus. In massa est, commodo a orci non, dapibus tempus mi.</p>
        <a id="zoneClic1" href="?page_id=168" title="Nous trouver"></a>
    </div>
</div>

<!--BLOC 4-->
<div class="wrapper4">
    <div class="blocASS1">
        <h4 class="txtAT05C2">/--- L'ASSOCIATION ---/</h4>

        <p class="txtPad01">Lieu d’expérimentation, la Galerie des Galeries continue ici à imaginer de nouvelles formes
            d’expositions et invite des contributeurs issus de différents champs créatifs à penser ensemble un projet
            qui interroge l’art, la mode et le design. Le visiteur se retrouve au sein d’une circulation particulière
            dont le point de départ est toujours l’oeuvre.
            <br>
            <!--BOUTON DYNAMIQUE-->

        <div class="post-tag">
                    <span class="arrow-btn post-tag-arrow">
                    <i class="arrow-btn-icon jaa-icon-arrow-right post-tag-arrow-icon"></i>
                    <span class="arrow-btn-circle post-tag-arrow-circle"></span>
                    <span class="arrow-btn-text post-tag-arrow-text"><a href="association.html">EN SAVOIR +</a></span>
                    </span>
        </div>


        </p>

        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/LeLieu_btn01.png" alt=""
                         class="floatR PadTop2"></a>
    </div>
    <img src="<?php echo get_template_directory_uri(); ?>/img/LeLieu_BG03.png" alt="L'association Blanc Titane"
         class="blocASS2VALIGN">
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
