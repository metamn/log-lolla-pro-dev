<?php
/**
 * Displays the comment excerpt.
 *
 * It contains:
 * * A Read more comment template part.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$klass = '';
?>

<aside class="comment-excerpt">
	<h3 class="hidden">Comment excerpt</h3>

	<div class="text">
		<?php echo wp_kses_post( get_comment_excerpt( $comment ) ); ?>
	</div>

	<?php get_template_part( 'template-parts/comment/parts/comment', 'read-more' ); ?>
</aside>
