<?php
  /**
   * List item graphic
   *
   * This is usually a HTML / SVG element
   * This list item is optional
   *
   * @link https://material.io/design/components/lists.html
   * @link http://material-components-web.appspot.com/list.html
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  if ( empty( $list_item_graphic ) ) {
    $list_item_graphic = get_query_var( 'list_item_graphic' );
  }

  if ( empty( $list_item_graphic ) ) return;
?>

<div class="list_item_graphic">
  <?php if ( isset( $list_item_graphic['url'] ) ) { ?>
    <a class="link" href="<?php echo $list_item_graphic['url'] ?>" title="<?php echo $list_item_graphic['title'] ?>">
  <?php } ?>

  <?php echo $list_item_graphic['content'] ?>

  <?php if ( isset( $list_item_graphic['url'] ) ) { ?>
    </a>
  <?php } ?>
</div>
