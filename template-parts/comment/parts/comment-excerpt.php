<?php
  /**
   * Displaying comment excerpt
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<aside class="comment-excerpt">
  <h3 class="hidden">Comment excerpt</h3>

  <div class="text">
    <?php echo get_comment_excerpt( $comment ) ?>
  </div>

  <?php get_template_part( 'template-parts/comment/parts/comment', 'read-more' ); ?>
</aside>
