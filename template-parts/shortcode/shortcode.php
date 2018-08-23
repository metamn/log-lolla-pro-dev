<?php
/**
 * Displays a shortcode
 *
 * @param string $shortcode_klass Additional classnames for this component.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( empty( $shortcode_klass ) ) {
	$shortcode_klass = get_query_var( $shortcode_klass );
}
?>

<aside class="shortcode <?php echo esc_attr( $shortcode_klass ); ?>">
	<?php get_template_part( 'template-parts/shortcode/parts/shortcode', 'title' ); ?>
	<?php get_template_part( 'template-parts/shortcode/parts/shortcode', 'body' ); ?>
</aside>
