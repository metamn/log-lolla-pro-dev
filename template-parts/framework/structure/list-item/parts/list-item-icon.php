<?php
  /**
   * List item icon
   *
   * This list item is optional
   *
   * @link https://material.io/design/components/lists.html
   * @link http://material-components-web.appspot.com/list.html
   *
   * @package Log_Lolla_Pro
   */

  if ( empty( $list_item_icon ) ) {
    $list_item_icon = get_query_var( 'list_item_icon' );
  }

  if ( empty( $list_item_icon_url ) ) {
    $list_item_icon_url = get_query_var( 'list_item_icon_url' );
  }

  if ( empty( $list_item_url ) ) {
    $list_item_url = get_query_var( 'list_item_url' );
  }

  if ( empty( $list_item_primary_text ) ) {
    $list_item_primary_text = get_query_var( 'list_item_primary_text' );
  }

  if ( empty( $list_item_icon ) ) return;
?>

<div class="list-item-icon">
  <?php if ( ! empty( $list_item_icon_url ) ) { ?>
    <a class="link" href="<?php echo $list_item_url ?>" title="<?php echo $list_item_primary_text ?>">
  <?php } ?>

  <?php echo $list_item_icon ?>

  <?php if ( isset( $list_item_icon_url ) ) { ?>
    </a>
  <?php } ?>
</div>
