<?php
/**
 * Displays sparklines
 *
 * @param string $sparklines The content for the sparklines.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

$sparklines = get_query_var( 'sparklines' );
?>

<span class="sparklines sparks-font sparks-font-dotline-medium">
	<?php echo esc_html( $sparklines ); ?>
</span>
