<?php
/**
 * Displays the "Read more" link for a comment excerpt
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$klass = '';
?>

<div class="read-more">
	<?php
	printf(
		'<a class="link" href="%1$s" title="%2$s">%3$s</a>',
		esc_url( get_comment_link( $comment ) ),
		esc_attr( get_the_title( $comment->comment_post_ID ) ),
		esc_html( log_lolla_pro_add_readmore_to_content() )
	);
	?>
</div>
