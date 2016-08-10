<?php
/**
 * Template Name: Front Page
 *
 * @package Sela
 */

get_header(); ?>


<div id="page" class="hfeed site">
	<div id="content" class="site-content">

		<div id="primary" class="content-area front-page-content-area">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
		</div><!-- #primary -->
	</div><!-- #content -->

<?php get_footer(); ?>