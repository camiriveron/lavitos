<?php
/**
 * The main template file.
 *
 * @package Sela
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
			<?php query_posts( 'category_name=Historias&showposts=8' ); ?>
		<div class="l-carousel__wrapper">
			<span class="genericon genericon-previous l-carousel-previous"></span>
			<div id="owl-lavitos" class="owl-carousel l-carousel">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if ( has_post_thumbnail() ) : ?>
					    <div class="item l-carousel__image scale__image__wrapper">
					    	<?php the_post_thumbnail('sela-carousel-thumbnail'); ?>
							<a class="l-carousel__hover" href="<?php the_permalink(); ?>">
								<h1 class="l-carousel__title"><?php the_title_attribute(); ?></h1>
								<h4 class="l-carousel__subtitle"><?php the_time('d-m-Y') ?> por: <?php the_author() ?> </h4>
							</a>
						</div>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
			<span class="genericon genericon-next l-carousel-next"></span>
		</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-quote' ) ) : ?>
	<div class="widget-area quote-widget-area">
		<?php dynamic_sidebar( 'sidebar-quote' ); ?>
	</div>
<?php endif; ?>

<div id="page" class="hfeed site">
<div id="content" class="site-content">

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

<?php if ( have_posts() ) : ?>

	<?php query_posts( 'category_name=Historias&showposts=1' ); ?>
	<?php while ( have_posts() ) : the_post(); 
		get_template_part( 'content', get_post_format() );
	 endwhile; ?>

<?php else : ?>

	<?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>

</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>

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
        scrollPerPage: true,
     });

	$('.l-carousel-previous ').on('click', function(){
		owl.trigger('owl.prev');
	});

	$('.l-carousel-next ').on('click', function(){
		owl.trigger('owl.next');
	});

})( jQuery );
</script>



