<?php

    if ( get_option( 'show_on_front' ) == 'posts' ) {
        get_template_part( 'index' );
    } elseif ( 'page' == get_option( 'show_on_front' ) ) {

 get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-12">
		<main id="main" class="site-main" role="main">

			<?php get_header(); ?>

			<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
				your browser</a> to improve your experience.</p>
			<![endif]-->

			<!--SLIDER-->
			<div class='pageblock' id='fullscreen'>
				<div class='slider'>
					<div class='slide' id="first">
						<div class='slidecontent'>
							<span class="headersur">Le studio de convergence créative</span>

							<h1>ON-OFF</h1>

							<div class="button" onclick="mainslider.nextSlide();">Les stages et ateliers -></div>
						</div>
					</div>

					<div class='slide' id="sec">
						<div class='slidecontent'>
							<span class="headersur">Apprendre, créér et partager</span>

							<h1>ATELIERS</h1>

							<div class="text">
								<div class="button" onclick="mainslider.nextSlide();">Les expositions -></div>
							</div>
						</div>
					</div>

					<div class='slide' id="thirth">
						<div class='slidecontent'>
							<span class="headersur">L'art se déploie</span>

							<h1>EXPOSITIONS</h1>

							<div class="text">
								<div class="button" onclick="mainslider.nextSlide();">Réservez l'espace On-Off -></div>
							</div>
						</div>
					</div>
					<div class='slide' id="fourth">
						<div class='slidecontent'>
							<span class="headersur">Privatisation de l'espace On-Off</span>

							<h1>PRIVATISATION</h1>

							<div class="text">
								<div class="button" onclick="mainslider.nextSlide();">On-Off le studio -></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="menu">
					<td width="100">
						<a>Test menu</a>
					</td>
				</div>
			</div>


			</html>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	get_footer();
}
?>