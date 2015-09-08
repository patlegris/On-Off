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
    <img src="<?php echo get_template_directory_uri(); ?>/img/Evenements_BG01.jpg" alt="Atelier ON-OFF Studio"
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
        <p>Dans le cadre de ses activités culturelles, le studio on-off vous propose différents types d'événements liés à son actualité. Vous pouvez retrouver ici, les évenements passés en cours et à venir. En passant par des soirées autour de divers thèmes liés à la culture, ainsi que des performances, des vernissages, et d'autres évènements.
    </div>
</div>

<!--BLOC 3-->
<div class="wrapper3">
    <h4 class="txtAT05"><span class="txtAT05A">08</span><span class="txtAT05B">OCT 2015</span><span
            class="txtAT05C">/--- SOIRÉE THÉMATIQUE ---/</span>
    </h4>

    <div class="BG06">
        <p>Autour du thème annuel du ON-OFF Studio « La trace », la première soirée thématique réunira autour d’un cocktail les adhérents de l'association Blanc Titane, le public, et différents artistes liés au studio. L’organisation se fait dans un cadre de rencontres artistiques et de démocratisation de l’art pour réduire la distance les artistes et le public.


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
        <p>L'artiste urbain sera mis à l'honneur lors de la prochaine soirée thématique qui se déroulera au mois de novembre. Les différentes discplines du street-art seront mises à l'honneur.</p>

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
