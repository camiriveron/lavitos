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
        itemsDesktop : [1500,3], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,3], // betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0
		itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
        navigation : false,
        pagination: false,
        slideSpeed: 700,
     });

	$('.l-carousel-previous ').on('click', function(){
		//owl.trigger('owl.prev');
		owl.trigger('owl.goTo', 1);
	});

	$('.l-carousel-next ').on('click', function(){
		//owl.trigger('owl.next');
		owl.trigger('owl.goTo', 8);
	});

})( jQuery );
</script>
<?php get_footer(); ?>



