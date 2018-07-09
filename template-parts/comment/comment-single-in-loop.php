<?php
/**
 * Displays a comment inside a loop.
 *
 * It contains:
 * * A Date and time comment template part.
 * * A Post title with arrows comment template part.
 * * A Content or excerpt comment template part.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( empty( $comment ) ) {
	return;
}
?>

<article class="post post-format-comment" id="comment-<?php echo esc_attr( get_comment_id( $comment ) ); ?>">
	<h3 class="hidden">Comment</h3>
	<?php get_template_part( 'template-parts/comment/parts/comment', 'date-and-time' ); ?>
	<?php get_template_part( 'template-parts/comment/parts/comment', 'post-title-with-arrows' ); ?>
	<?php get_template_part( 'template-parts/comment/parts/comment', 'content-or-excerpt' ); ?>
</article>
