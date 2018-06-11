<?php
  /**
   * Display post count
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */
?>

<?php get_query_var( 'post_count' ); ?>

<span class="post-count">
  <?php echo $post_count ?>
</span>
