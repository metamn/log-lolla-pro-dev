<?php
/**
 * Displays a list item graphic.
 *
 * This is usually a decorative HTML / SVG element.
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( ! log_lolla_pro_empty( $list_item_graphic ) ) {
	$list_item_graphic = get_query_var( 'list_item_graphic' );
}

if ( empty( $list_item_graphic_url ) ) {
	$list_item_graphic_url = get_query_var( 'list_item_graphic_url' );
}

if ( empty( $list_item_url ) ) {
	$list_item_url = get_query_var( 'list_item_url' );
}

if ( empty( $list_item_primary_text ) ) {
	$list_item_primary_text = get_query_var( 'list_item_primary_text' );
}

if ( log_lolla_pro_empty( $list_item_graphic ) ) {
	return;
}
?>

<div class="list-item-graphic">
	<?php
	if ( ! empty( $list_item_graphic_url ) ) {
		set_query_var( 'list-url', $list_item_url );
		set_query_var( 'list-title', $list_item_primary_text );
		set_query_var( 'list-content', $list_item_graphic );
		get_template_part( 'template-parts/framework/design/typography/elements/link/link' );
	} else {
		echo wp_kses_post( $list_item_graphic );
	}
	?>
</div>
