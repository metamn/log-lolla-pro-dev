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
?>

<?php
  if ( empty( $list_item_avatar ) ) {
    $list_item_avatar = get_query_var( 'list_item_avatar' );
  }

  if ( empty( $list_item_avatar ) ) return;
?>

<figure class="list_item_avatar">
  <?php if ( isset( $list_item_avatar['url'] ) ) { ?>
    <a class="link" href="<?php echo $list_item_avatar['url'] ?>" title="<?php echo $list_item_avatar['title'] ?>">
  <?php } ?>

  <?php echo $list_item_avatar['image'] ?>

  <?php if ( isset( $list_item_avatar['url'] ) ) { ?>
    </a>
  <?php } ?>
</figure>
