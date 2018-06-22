<?php
/**
 * Displays the list item secondary text.
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Pro
 */

if ( empty( $list_item_secondary_text ) ) {
	$list_item_primary_text = get_query_var( 'list_item_secondary_text' );
}

if ( empty( $list_item_secondary_text ) ) {
	return;
}
?>

<div class="list-item-secondary-text">
	<?php echo wp_kses_post( $list_item_secondary_text ); ?>
</div>
