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
?>

<?php
  if ( empty( $list_item_primary_text ) ) {
    $list_item_primary_text = get_query_var( 'list_item_primary_text' );
  }
?>

<h3 class="list-item-primary-text">
  <?php echo $list_item_primary_text; ?>
</h3>
