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

			<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile; ?>
	</div><!-- #primary -->

	<?php get_sidebar( 'front-page' ); ?>
<?php get_sidebar( 'footer' ); ?>
<?php get_footer(); ?>