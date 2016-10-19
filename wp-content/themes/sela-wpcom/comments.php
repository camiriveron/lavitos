<?php
/**
 * The template for displaying Comments.
 *
 * @package Sela
 */

if ( post_password_required() )
	return;
?>
<div class="fb-comments" data-href="<?php the_permalink();?>" data-width="100%" data-numposts="10"></div>
	<div id="comments" class="comments-area">
		<h2 class="comments-title">
			Comentarios
		</h2>
	<div class="fb-comments" data-href="<?php the_permalink();?>" data-width="100%" data-numposts="10"></div>
</div><!-- #comments -->
