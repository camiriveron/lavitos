<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Sela
 */

get_header(); ?>


<div id="page" class="hfeed site">
<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php if( 'jetpack-testimonial' === get_post_type() ): ?>

				<?php get_template_part( 'content', 'testimonial' ); ?>

				<?php sela_post_nav(); ?>

			<?php else: ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

				<?php sela_post_nav(); ?>

				<?php 
					aboutme_post_func();
				?>	

				<?php
				$tags = wp_get_post_terms( get_queried_object_id(), 'post_tag', ['fields' => 'ids'] );
				echo $tags;
				$args = [
				    'post__not_in'        => array( get_queried_object_id() ),
				    'posts_per_page'      => 3,
				    'ignore_sticky_posts' => 1,
				    'orderby'             => 'rand',
				    'tax_query' => [
				        [
				            'taxonomy' => 'post_tag',
				            'terms'    => $tags
				        ]
				    ]
				];
				$my_query = new wp_query( $args );
				if( $my_query->have_posts() ) {
				    echo '<div class="related-posts__wrapper">
						<h3 class="widget-title">Historias Relacionadas</h3>
						<div class="related-posts">';
				        while( $my_query->have_posts() ) {
				            $my_query->the_post(); ?>
				            <div class="relatedthumb">
							    <a rel="external" href="<? the_permalink()?>">
								    <div class="scale__image__wrapper">
								    	<?php the_post_thumbnail(array(200,200)); ?>
								    </div>
								    <?php the_title(); ?>
							    </a>
						  </div>
				        <?php }
				        wp_reset_postdata();
				    echo '</div></div><!--related-->';
				}
				?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) {
						comments_template();
					}
				?>

			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
