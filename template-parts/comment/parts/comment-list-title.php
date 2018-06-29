<?php
/**
 * Displays the title of a comment list
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$klass = '';
?>

<h3 class="comments-title">
	<?php
	$text = '';

	$number_of_comments = get_query_var( 'number_of_comments' );

	if ( 1 === $number_of_comments ) {
		/* translators: %s: 1 comment. */
		$text = esc_html_x( 'One update', 'one comment', 'log-lolla-pro' );
	} else {
		/* translators: %s: comments. */
		$text = $number_of_comments . esc_html_x( ' updates', ' comments', 'log-lolla-pro' );
	}

	$arrows  = log_lolla_pro_get_arrow_html( 'bottom' );
	$arrows .= log_lolla_pro_get_arrow_html( 'bottom' );
	$arrows .= log_lolla_pro_get_arrow_html( 'bottom' );

	printf(
		'<span class="arrows">%1$s</span><span class="number-of-comments">%2$s</span><span class="arrows">%3$s</span>',
		wp_kses_post( $arrows ),
		esc_html( $text ),
		wp_kses_post( $arrows )
	);
	?>
</h3>
