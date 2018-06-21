<?php
/**
 * Displays a list item graphic
 *
 * This is usually a HTML / SVG element
 * This list item is optional
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( empty( $list_item_graphic ) ) {
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

if ( empty( $list_item_graphic ) ) {
	return;
}
?>

<div class="list-item-graphic">
	<?php
	if ( ! empty( $list_item_graphic_url ) ) {
		?>
		<a class="link" href="<?php echo esc_url( $list_item_url ); ?>" title="<?php echo esc_attr( $list_item_primary_text ); ?>">
		<?php
	}
	?>

	<?php echo esc_html( $list_item_graphic ); ?>

	<?php
	if ( isset( $list_item_graphic_url ) ) {
		?>
		</a>
		<?php
	}
	?>
</div>
