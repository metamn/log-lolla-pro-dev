<?php
  /**
   * Template part for displaying post count
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  $source_post_count = get_query_var( 'source_post_count' );
?>

<span class="post-count">
  <?php echo $source_post_count ?>
</span>
