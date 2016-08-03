<?php
/**
 * The main template file.
 *
 * @package Sela
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>

			<?php sela_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<script>
(function($) {

	var owl = $("#owl-lavitos");

	owl.owlCarousel({
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
        navigation : false,
        pagination: true,
        slideSpeed: 300,
     });

	$('.l-carousel-previous ').on('click', function(){
		owl.trigger('owl.prev');
	});

	$('.l-carousel-next ').on('click', function(){
		owl.trigger('owl.next');
	});

})( jQuery );
</script>
<?php get_footer(); ?>



