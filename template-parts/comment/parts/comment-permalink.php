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
		/* translators: The comment permalink title attribute ( <a title="" ...>). */
		esc_attr( esc_html_x( 'Comment permalink', 'comment permalink title', 'log-lolla-pro' ) ),
		/* translators: The comment permalink text. */
		esc_html_x( '&infin;', 'comment permalink text', 'log-lolla-pro' )
	);
	?>
</aside>
