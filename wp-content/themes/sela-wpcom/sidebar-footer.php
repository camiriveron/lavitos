<?php
/**
 * The sidebar containing the footer page widget areas.
 *
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package Sela
 */

if ( ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) && ! is_active_sidebar( 'sidebar-4' ) ) {
	return;
}
?>

<?php if ( !(is_single() && 'post' == get_post_type()) ) : ?>
	<?php if ( is_active_sidebar( 'sidebar-register' ) ) : ?>
		<div class="widget-area register-widget-area">
			<?php dynamic_sidebar( 'sidebar-register' ); ?>
		</div>
	<?php endif; ?>
<?php endif; ?>
<?php if ( is_active_sidebar( 'sidebar-instagram' ) ) : ?>
	<div class="widget-area footer-widget-area">
		<?php dynamic_sidebar( 'sidebar-instagram' ); ?>
	</div>
<?php endif; ?>
<div id="tertiary" class="widget-area footer-widget-area" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<div id="widget-area-2" class="widget-area">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- #widget-area-2 -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	<div id="widget-area-3" class="widget-area">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div><!-- #widget-area-3 -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
	<div id="widget-area-4" class="widget-area">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</div><!-- #widget-area-4 -->
	<?php endif; ?>
</div><!-- #tertiary -->
