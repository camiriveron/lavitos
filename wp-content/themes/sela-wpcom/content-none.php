<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Sela
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'sela' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Lista para publicar tu primer post? <a href="%1$s">Get started here</a>.', 'sela' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Perdón, pero no pudimos encontrar tu criterio de búsqueda. Por favor, intenta nuevamente utilizando otras palabras.', 'sela' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'No podemos encontrar el contenido. Quizás buscar te pueda ayudar.', 'sela' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
