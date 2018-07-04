<?php
/**
 * Displays a list item avatar.
 *
 * This is an image with optionally a link.
 *
 * @link https://material.io/design/components/lists.html
 * @link http://material-components-web.appspot.com/list.html
 *
 * @package Log_Lolla_Pro
 */

if ( empty( $list_item_avatar ) ) {
	$list_item_avatar = get_query_var( 'list_item_avatar' );
}

if ( empty( $list_item_avatar_url ) ) {
	$list_item_avatar_url = get_query_var( 'list_item_avatar_url' );
}

if ( empty( $list_item_url ) ) {
	$list_item_url = get_query_var( 'list_item_url' );
}

if ( empty( $list_item_primary_text ) ) {
	$list_item_primary_text = get_query_var( 'list_item_primary_text' );
}

if ( empty( $list_item_avatar ) ) {
	return;
}
?>

<figure class="list-item-avatar">
	<?php
	if ( ! empty( $list_item_avatar_url ) ) {
		set_query_var( 'link-url', $list_item_url );
		set_query_var( 'link-title', $list_item_primary_text );
		set_query_var( 'link-content', $list_item_avatar );
		get_template_part( 'template-parts/framework/design/typography/elements/link/link' );
	} else {
		echo wp_kses_post( $list_item_avatar );
	}
	?>

	<figcaption class="figcaption">
		<?php echo wp_kses_post( $list_item_primary_text ); ?>
	</figcaption>
</figure>
