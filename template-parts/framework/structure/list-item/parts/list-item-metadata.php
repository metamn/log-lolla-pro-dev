<?php
  /**
   * List item metadata
   *
   * This is usually a HTML element
   * This list item is optional
   *
   * @link https://material.io/design/components/lists.html
   * @link http://material-components-web.appspot.com/list.html
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  if ( empty( $list_item_metadata ) ) {
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

  if ( empty( $list_item_metadata ) ) return;
?>

<div class="list-item-metadata">
  <?php if ( ! empty( $list_item_metadata_url ) ) { ?>
    <a class="link" href="<?php echo $list_item_url ?>" title="<?php echo $list_item_primary_text ?>">
  <?php } ?>

  <?php echo $list_item_metadata ?>

  <?php if ( isset( $list_item_metadata_url ) ) { ?>
    </a>
  <?php } ?>
</div>
