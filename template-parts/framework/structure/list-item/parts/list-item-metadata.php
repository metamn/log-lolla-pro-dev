<?php
/**
 * List item metadata.
 *
 * This is usually a HTML element.
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Pro
 */

if ( log_lolla_pro_empty( $list_item_metadata ) ) {
	$list_item_metadata = get_query_var( 'list_item_metadata' );
}

if ( empty( $list_item_metadata_url ) ) {
	$list_item_metadata_url = get_query_var( 'list_item_metadata_url' );
}

if ( empty( $list_item_url ) ) {
	$list_item_url = get_query_var( 'list_item_url' );
}

if ( empty( $list_item_primary_text ) ) {
	$list_item_primary_text = get_query_var( 'list_item_primary_text' );
}

if ( log_lolla_pro_empty( $list_item_metadata ) ) {
	return;
}
?>

<div class="list-item-metadata">
	<?php
	if ( ! empty( $list_item_metadata_url ) ) {
		set_query_var( 'list-url', $list_item_url );
		set_query_var( 'list-title', $list_item_primary_text );
		set_query_var( 'list-content', $list_item_metadata );
		get_template_part( 'template-parts/framework/design/typography/elements/link/link' );
	} else {
		echo wp_kses_post( $list_item_metadata );
	}
	?>
</div>
