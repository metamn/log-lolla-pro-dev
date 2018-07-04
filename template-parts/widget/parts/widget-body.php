<?php
/**
 * Template part to display a widget body
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
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
