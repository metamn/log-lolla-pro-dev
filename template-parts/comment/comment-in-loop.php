<?php
  /**
   * Template part to display a comment in the loop
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */

  if ( empty( $comment ) ) return;
?>

<article class="post post-format-comment">
  <?php get_template_part( 'template-parts/comment/parts/comment', 'date-and-time' ); ?>
  <?php get_template_part( 'template-parts/comment/parts/comment', 'post-title-with-arrows' ); ?>
  <?php get_template_part( 'template-parts/comment/parts/comment', 'content-or-excerpt' ); ?>
</article>
