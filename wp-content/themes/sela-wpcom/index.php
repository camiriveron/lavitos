<?php
/**
 * The main template file.
 *
 * @package Sela
 */

get_header(); ?>


<div id="page" class="hfeed site">
	<div id="content" class="site-content">

	<?php if ( have_posts() ) : ?>
			<?php query_posts( 'category_name=Cuentos&showposts=8' ); ?>
		<div class="l-carousel__wrapper">
			<span class="genericon genericon-previous l-carousel-previous"></span>
			<div id="owl-lavitos" class="owl-carousel l-carousel">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="item l-carousel__image" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
						<a class="l-carousel__hover" href="<?php the_permalink(); ?>">
							<h4 class="l-carousel__subtitle"><?php the_time('d-m-Y') ?> por: <?php the_author() ?> </h4>
							<h1 class="l-carousel__title"><?php the_title_attribute(); ?></h1>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
			<span class="genericon genericon-next l-carousel-next"></span>
		</div>
	<?php endif; ?>

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
		itemsDesktopSmall : [1100,2], // betweem 900px and 601px
		itemsTablet: [700,1], //2 items between 600 and 0
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



