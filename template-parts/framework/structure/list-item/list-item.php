<?php
  /**
   * List item
   *
   * Material design like list items
   *
   * @link https://material.io/design/components/lists.html
   * @link http://material-components-web.appspot.com/list.html
   *
   * @package Log_Lolla_Pro
   */

  $list_item_class = get_query_var( 'list_item_class' );
  $list_item_primary_text = get_query_var( 'list_item_primary_text' );
  $list_item_secondary_text = get_query_var( 'list_item_secondary_text' );
  $list_item_avatar = get_query_var( 'list_item_avatar' );
  $list_item_graphic = get_query_var( 'list_item_graphic' );
  $list_item_metadata = get_query_var( 'list_item_metadata' );
  $list_item_icon = get_query_var( 'list_item_icon' );

  $list_item_url = get_query_var( 'list_item_url' );
  $list_item_avatar_url = get_query_var( 'list_item_avatar_url' );
  $list_item_graphic_url = get_query_var( 'list_item_graphic_url' );
  $list_item_metadata_url = get_query_var( 'list_item_metadata_url' );
  $list_item_icon_url = get_query_var( 'list_item_icon_url' );
?>

<aside class="list-item <?php echo $list_item_class ?>">
  <?php
    if ( ! empty( $list_item_secondary_text ) ) {
      get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'primary-and-secondary-text');
    } else {
      get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'primary-text');
    }

    if ( ! empty( $list_item_avatar ) ) {
      get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'avatar');
    } elseif ( ! empty( $list_item_graphic ) ) {
      get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'graphic');
    }

    get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'metadata');
    get_template_part( 'template-parts/framework/structure/list-item/parts/list-item', 'icon');
  ?>
</aside>
