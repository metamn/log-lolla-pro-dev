<?php
  /**
   * Template part to display a comment inside a post
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

  if ( empty( $comment ) ) return;
?>

<article class="comment" id="comment-<?php echo get_comment_id( $comment ) ?>">
  <?php get_template_part( 'template-parts/comment/parts/comment', 'date-and-time' ); ?>
  <?php get_template_part( 'template-parts/comment/parts/comment', 'content' ); ?>
  <?php get_template_part( 'template-parts/comment/parts/comment', 'permalink' ); ?>
</article>
