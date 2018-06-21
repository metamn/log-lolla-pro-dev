<?php
/**
 * Displays a triangle
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$klass     = get_query_var( 'triangle_klass' );
$direction = get_query_var( 'triangle_direction' );
?>

<span class="triangle triangle--<?php echo esc_attr( $triangle_direction ); ?>
	<?php echo esc_html( $triangle_klass ); ?>">
</span>
