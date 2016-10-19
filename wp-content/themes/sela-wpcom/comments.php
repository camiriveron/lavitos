<?php
/**
 * The template for displaying Comments.
 *
 * @package Sela
 */

if ( post_password_required() )
	return;
?>
<div id="comments" class="comments-area">
	<h3 class="comments-title">
		Comentarios
	</h3>
	<div class="fb-comments" data-href="<?php the_permalink();?>" data-width="100%" data-numposts="10"></div>
</div><!-- #comments -->
