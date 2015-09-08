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
    <img src="<?php echo get_template_directory_uri(); ?>/img/LeLieu_BG01.jpg" alt="Expositions ON-OFF Studio" class="clearB">

    <div class="titreAT1">
        <h1>LE STUDIO ON-OFF</h1>
    </div>

    <!--BLOC ASIDE-->
    <div class="blocAside">
        <h2 class="txtAT02"><span class="txtAT02G">INFORMATIONS</span></h2>

        <div class="BlocImg">
            <h4 class="titreAT04 BRTOP15">/--- DÉTAILS TECHNIQUES ---/</h4>

            <p class="txtAT04">Superficie : 30 m2; Accueil de personnes assises : 20; Accueil de personnes debout : 30
</p>

            <p class="txtAT04">Equipements (techniques et mobilier): 20 Chaises; 2 plateaux sur tréteaux (90x200 cm); 2 plateaux sur tréteaux (75x150 cm); 1 plateau fixé au mur espace I (60x200 cm); 1 table basse espace II; Accès internet par WiFi; Vidéoprojecteur Epson EMP 82; Ecran déroulant (taille image 386x274 cm); Ecran plat avec lecteur USB (50x30 cm); Lumière : 11 spots Erco; Rideaux occultant (espace I); Paper board.
</p>

        </div>
    </div>

    <div class="txtAT1">
        <p>Au coeur du quartier des épinettes, dans le 17éme arrondissement. Le studio On-Off est un lieu de vie culturel dédié à l'échange artistique. C'est un lieu ouvert au public, les accueillant lors d'expositons de différents artistes, d'ateliers ou de stages gérés par différentes associations, amsi également de soirées et d'évenements liés à la culture. Mais c'est également un lieu dédié à la création, car l'espace peut être mis à disposition d'artistes de manière locative, qui ne disposent pas de lieu pour exercer leurs talents.</p>
    </div>
    <span class="txtAT05C2">/--- L'ESPACE ON-OFF ---/</span>

    <div class="BG02">
        <p>Le studio on-off entend récréer un vrai lieu de vie, afin de devenir un relais culturel au sein du quartier. De part sa taille modeste, On-Off Studio se veut à échelle humaine, et mise réellement sur des échanges artistiques, associatifs tissant ainsi des liens entre les habitants des Epinettes, mais également ceux du 17éme arrondissement, de Paris, et de sa procha banlieue. Le studio on-off aimerait aussi donner une chance à des artistes peu connus, qui n'ont pas forcément de lieu d'expression de leur talent, ni de moyens de se confronter à un public, un espace d'exposition. Tout ceci peut se concrétiser et créer une alchimie entre des associations de quartier, des artistes pluri-disciplinaires, les habitants, et l'association porteuse du projet (l'association Blanc Titane).</p>
        <a id="zoneClic1" href="?page_id=168" title="Nous trouver"></a>
    </div>
</div>

<!--BLOC 4-->
<div class="wrapper4">
    <div class="blocASS1">
        <h4 class="txtAT05C2">/--- L'ASSOCIATION ---/</h4>

        <p class="txtPad01">Blanc Titane, association loi de 1901, est un collectif d'artistes et d'amoureux de l'art qui souhaite partager leur passion à travers le projet ON-OFF Studio. Vous êtes l'un ou l'autre ou même l'un et l'autre, nous avons besoin de vous pour pérenniser notre action. Une association a un équilibre qui ne peut être maintenu autrement que par ses membres, basé sur les cotisations et le bénévolat.

Vous voulez soutenir une action culturelle originale, être tenu au courant des Arrivages, être invité V.I.P. des vernissages, devenez membre adhérent.

            <br>
            <!--BOUTON DYNAMIQUE-->

        <div class="post-tag">
                    <span class="arrow-btn post-tag-arrow">
                    <i class="arrow-btn-icon jaa-icon-arrow-right post-tag-arrow-icon"></i>
                    <span class="arrow-btn-circle post-tag-arrow-circle"></span>
                    <span class="arrow-btn-text post-tag-arrow-text"><a href="?page_id=64">EN SAVOIR +</a></span>
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
