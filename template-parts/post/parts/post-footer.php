<?php
  /**
   * Displaying post date, author, categories and tags
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */
?>

<aside class="post-footer">
  <h3 class="hidden">Article footer</h3>

  <?php get_template_part( 'template-parts/post/parts/post', 'format-and-topics' ); ?>
  <?php get_template_part( 'template-parts/post/parts/post', 'date' ); ?>
  <?php get_template_part( 'template-parts/post/parts/post', 'author' ); ?>
  <?php get_template_part( 'template-parts/post/parts/post', 'edit-link' ); ?>
</aside>
