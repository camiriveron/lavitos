<?php
/**
 * The main template file.
 *
 * @package Sela
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<h2>Recent Posts</h2>
		<ul>
		<?php
			$args = array( 'numberposts' => '5',
			 'orderby' => 'post_date',
    		 'order' => 'DESC', );
			$recent_posts = wp_get_recent_posts( $args );
			foreach( $recent_posts as $recent ){
				echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
			}
		?>
		</ul>

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

	console.log("Hello Index!");

})( jQuery );
</script>
<?php get_footer(); ?>



