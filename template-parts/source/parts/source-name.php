<?php
  /**
   * Template part for displaying a source name
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  $source_link = get_query_var( 'source_link' );
  $source_name = get_query_var( 'source_name' );
?>

<h3 class="source__name">
  <a class="link" href="<?php echo $source_link ?>" title="<?php echo $source_name ?>">
    <?php echo $source_name ?>
  </a>
</h3>
