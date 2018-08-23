<?php
/**
 * Template part to display a widget body
 *
 * @param string $widget_body The content of the widget.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0.
 */

if ( empty( $widget_body ) ) {
	$widget_body = get_query_var( $widget_body );
}

if ( empty( $widget_body ) ) {
	return;
}
?>

<div class="widget-body">
	<?php echo wp_kses_post( $widget_body ); ?>
</div>
