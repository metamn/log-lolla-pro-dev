<?php
  /**
   * Template part for displaying a source thumbnail image
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  $source_link = get_query_var( 'source_link' );
  $source_name = get_query_var( 'source_name' );
  $source_image = get_query_var( 'source_image' );
?>

<figure class="source__icon figure">
  <a class="link" href="<?php echo $source_link ?>" title="<?php echo $source_name ?>">
    <?php echo $source_image ?>
  </a>
</figure>
