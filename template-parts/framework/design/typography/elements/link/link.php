<?php
/**
 * Displays a link.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( empty( $link_url ) ) {
	$link_url = get_query_var( 'link-url' );
}

if ( empty( $link_title ) ) {
	$link_title = get_query_var( 'link-title' );
}

if ( empty( $link_content ) ) {
	$link_content = get_query_var( 'link-content' );
}

if ( ! empty( $link_url ) ) {
	?>
	<a class="link" href="<?php echo esc_url( $link_url ); ?>" title="<?php echo esc_attr( $link_title ); ?>">
	<?php
}

echo wp_kses_post( $link_content );

if ( ! empty( $link_url ) ) {
	?>
	</a>
	<?php
}
