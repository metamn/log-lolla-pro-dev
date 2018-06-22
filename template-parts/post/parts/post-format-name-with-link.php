<?php
/**
 * Display post format name with a link pointing to the post format archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 */

get_query_var( 'post_format_name' );
?>

<a class="link" title="<?php echo esc_url( $post_format_name ); ?>" href="<?php echo esc_attr( get_post_format_link( $post_format_name ) ); ?>">
	<?php echo wp_kses_post( ucfirst( $post_format_name ) ); ?>
</a>
