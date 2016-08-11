<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Sela
 */

get_header(); ?>


<div id="page" class="hfeed site">
	<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! No podemos encontrar la página.', 'sela' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e('Parece que no hay nada en esta ubicación. Y si intentas buscando en el sitio aquí debajo?', 'sela' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>