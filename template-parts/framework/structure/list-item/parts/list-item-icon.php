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
?>

<?php
  if ( empty( $list_item_icon ) ) {
    $list_item_icon = get_query_var( 'list_item_icon' );
  }

  if ( empty( $list_item_icon ) ) return;
?>

<div class="list_item_icon">
  <?php if ( isset( $list_item_icon['url'] ) ) { ?>
    <a class="link" href="<?php echo $list_item_icon['url'] ?>" title="<?php echo $list_item_icon['title'] ?>">
  <?php } ?>

  <?php echo $list_item_icon['content'] ?>

  <?php if ( isset( $list_item_icon['url'] ) ) { ?>
    </a>
  <?php } ?>
</div>
