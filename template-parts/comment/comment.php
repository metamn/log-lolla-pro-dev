<?php
/**
 * Displays a comment inside a post.
 *
 * It contains:
 * * A Date and time comment template part.
 * * A Content comment template part.
 * * A Permalink comment template part.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( empty( $comment ) ) {
	return;
}
?>

<article class="comment" id="comment-<?php echo esc_attr( get_comment_id( $comment ) ); ?>">
	<?php get_template_part( 'template-parts/comment/parts/comment', 'date-and-time' ); ?>
	<?php get_template_part( 'template-parts/comment/parts/comment', 'content' ); ?>
	<?php get_template_part( 'template-parts/comment/parts/comment', 'permalink' ); ?>
</article>
