<?php
/**
 * Displays a widget title
 *
 * @param string $widget_title The widget title.
 * @param string $widget_title_url The widget title url.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0.
 */

if ( empty( $widget_title ) ) {
	$widget_title = get_query_var( $widget_title );
}

if ( empty( $widget_title_url ) ) {
	$widget_title_url = get_query_var( $widget_title_url );
}

if ( empty( $widget_title ) ) {
	return;
}
?>

<h3 class="widget-title">
	<?php if ( ! empty( $widget_title_url ) ) { ?>
	<a class="link" href="<?php echo esc_url( $widget_title_url ); ?>" title="<?php echo esc_attr( $widget_title ); ?>">
	<?php } ?>

	<?php echo esc_html( $widget_title ); ?>

	<?php if ( ! empty( $widget_title_url ) ) { ?>
	</a>
	<?php } ?>
</h3>
