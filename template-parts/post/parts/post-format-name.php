<?php
  /**
   * Display post format name
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */
?>

<?php get_query_var( 'post_format_name' ); ?>

<span class="post-format-name">
  <?php echo $post_format_name ?>
</span>
