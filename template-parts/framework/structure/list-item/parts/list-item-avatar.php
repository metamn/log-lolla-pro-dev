<?php
  /**
   * List item avatar
   *
   * This is an image with optionally a link
   * This list item is optional
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

  if ( empty( $list_item_avatar ) ) return;
?>

<figure class="list-item-avatar">
  <?php if ( ! empty( $list_item_avatar_url ) ) { ?>
    <a class="link" href="<?php echo $list_item_url ?>" title="<?php echo $list_item_primary_text ?>">
  <?php } ?>

  <?php echo $list_item_avatar ?>

  <?php if ( isset( $list_item_avatar_url ) ) { ?>
    </a>
  <?php } ?>
</figure>
