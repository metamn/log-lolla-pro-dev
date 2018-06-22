<?php
/**
 * Displays the list item primary and secondary text.
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Pro
 */

if ( empty( $list_item_primary_text ) ) {
	$list_item_primary_text = get_query_var( 'list_item_primary_text' );
}

if ( empty( $list_item_secondary_text ) ) {
	$list_item_secondary_text = get_query_var( 'list_item_secondary_text' );
}

if ( empty( $list_item_primary_text ) && empty( $list_item_secondary_text ) ) {
	return;
}
?>

<div class="list-item-primary-and-secondary-text">
	<?php get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'primary-text' ); ?>
	<?php get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'secondary-text' ); ?>
</div>
