<?php
/**
 * Template part to display a shortcode body
 *
 * @param string $shortcode_body The content of the shortcode.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( empty( $shortcode_body ) ) {
	$shortcode_body = get_query_var( $shortcode_body );
}

if ( empty( $shortcode_body ) ) {
	return;
}
?>

<div class="shortcode-body">
	<?php echo wp_kses_post( $shortcode_body ); ?>
</div>
