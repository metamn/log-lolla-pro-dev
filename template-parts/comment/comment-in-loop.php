<?php
  /**
   * Template part to display a comment in the loop
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<?php
  if ( empty( $comment ) ) return;
?>

<article class="post post-comment">
  <?php get_template_part( 'template-parts/comment/parts/comment', 'post-title' ); ?>
  <?php get_template_part( 'template-parts/comment/parts/comment', 'date' ); ?>
  <?php get_template_part( 'template-parts/comment/parts/comment', 'content' ); ?>
</article>
