<?php
  /**
   * List item primary text
   *
   * This must be always present
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
  <?php if ( ! empty( $list_item_url ) ) { ?>
    <a class="link" href="<?php echo $list_item_url ?>" title="<?php echo $list_item_primary_text ?>">
  <?php }  ?>

  <?php echo $list_item_primary_text; ?>

  <?php if ( ! empty( $list_item_url ) ) { ?>
    </a>
  <?php }  ?>
</h3>
