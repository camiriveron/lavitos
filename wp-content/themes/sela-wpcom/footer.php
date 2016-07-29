<?php
/**
 * The template for displaying the footer.
 *
 * @package Sela
 */
?>

	</div><!-- #content -->
</div><!-- #page -->

	<?php get_sidebar( 'footer' ); ?>

	<footer id="colophon" class="site-footer">
		<?php if ( has_nav_menu ( 'social' ) ) : ?>
			<?php wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links', ) ); ?>
		<?php endif; ?>

		<div class="site-info"  role="contentinfo">
			<span>© 2016 - Lavitos. Todos los derechos reservados.</span>
			<span class="sep"> | </span>
			<?php printf( __( 'Tema: %1$s adaptado por %2$s.', 'sela' ), '<a href="https://wordpress.com/themes/" rel="designer">Sela</a>',
				'<a href="https://github.com/camiriveron" rel="designer">Camila Riverón</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="owl-carousel/owl.theme.css">
<script src="owl-carousel/owl.carousel.js"></script>

</body>
</html>
