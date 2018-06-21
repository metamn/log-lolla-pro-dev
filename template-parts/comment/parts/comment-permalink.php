<?php
/**
 * Displays the permalink associated to a comment
 *
 * @package Log_Lolla_Pro
 */

$link = get_comment_link( $comment );
?>

<aside class="comment-permalink">
	<h3 class="hidden">Comment permalink</h3>

	<?php
	printf(
		'<a class="link" href="%1$s" title="%2$s">%3$s</a>',
		esc_url( $link ),
		/* translators: %s: comment permalink. */
		esc_attr( esc_html_x( 'Comment permalink', 'comment permalink title', 'log-lolla-pro' ) ),
		/* translators: %s: post permalink. */
		esc_html_x( '&infin;', 'post permalink', 'log-lolla-pro' )
	);
	?>
</aside>
