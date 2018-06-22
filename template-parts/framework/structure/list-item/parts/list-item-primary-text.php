<?php
/**
 * Displays the list item primary text.
 *
 * This must be always present.
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Pro
 */

if ( empty( $list_item_primary_text ) ) {
	$list_item_primary_text = get_query_var( 'list_item_primary_text' );
}

if ( empty( $list_item_url ) ) {
	$list_item_url = get_query_var( 'list_item_url' );
}
?>

<h3 class="list-item-primary-text">
	<?php
	if ( ! empty( $list_item_url ) ) {
		set_query_var( 'list-url', $list_item_url );
		set_query_var( 'list-title', $list_item_primary_text );
		set_query_var( 'list-content', $list_item_primary_text );
		get_template_part( 'template-parts/framework/design/typography/elements/link/link' );
	} else {
		echo wp_kses_post( $list_item_primary_text );
	}
	?>
</h3>
