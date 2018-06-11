<?php
  /**
   * Displaying "Read more" for a comment excerpt
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<div class="read-more">
  <?php
    printf(
      '<a class="link" href="%1$s" title="%2$s">%3$s</a>',
      esc_url( get_comment_link( $comment ) ),
      esc_attr( get_the_title( $comment->comment_post_ID ) ),
      log_lolla_add_readmore_to_content()
    );
  ?>
</div>
