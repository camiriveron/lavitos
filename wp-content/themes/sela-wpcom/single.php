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

				<div class="related-posts__wrapper">
					<h3 class="widget-title">Historias Relacionadas</h3>
					<div class="related-posts">
					<?php
					  $orig_post = $post;
					  global $post;
					  $tags = wp_get_post_tags($post->ID);
					   
					  if ($tags) {
					  $tag_ids = array();
					  foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
					  $args=array(
					  'tag__in' => $tag_ids,
					  'post__not_in' => array($post->ID),
					  'posts_per_page'=>3, // Number of related posts to display.
					  'caller_get_posts'=>1
					  );
					   
					  $my_query = new wp_query( $args );
					 
					  while( $my_query->have_posts() ) {
					  $my_query->the_post();
					  ?>
					   
					  <div class="relatedthumb">
					    <a rel="external" href="<? the_permalink()?>"><?php the_post_thumbnail(array(200,200)); ?><br />
					    <?php the_title(); ?>
					    </a>
					  </div>
					   
					  <? }
					  }
					  $post = $orig_post;
					  wp_reset_query();
					  ?>
					</div>
				</div>

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
