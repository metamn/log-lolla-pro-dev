<?php
/**
 * Template part to display a shortcode title
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 */

if ( empty( $shortcode_title ) ) {
	$shortcode_title = get_query_var( $shortcode_title );
}

if ( empty( $shortcode_title ) ) {
	return;
}

if ( empty( $shortcode_title_url ) ) {
	$shortcode_title_url = get_query_var( $shortcode_title_url );
}

?>

<h3 class="shortcode-title">
	<?php if ( ! empty( $shortcode_title_url ) ) { ?>
	<a class="link" href="<?php echo esc_url( $shortcode_title_url ); ?>" title="<?php echo esc_attr( $shortcode_title ); ?>">
	<?php } ?>

	<?php echo esc_html( $shortcode_title ); ?>

	<?php if ( ! empty( $shortcode_title_url ) ) { ?>
	</a>
	<?php } ?>
</h3>
