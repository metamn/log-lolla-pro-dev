<?php
  /**
   * Displaying the permalink associated to a comment
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<aside class="comment-permalink">
  <h3 class="hidden">Comment permalink</h3>

  <?php
    printf(
      '<a class="link" href="%1$s" title="%2$s">%3$s</a>',
      esc_url( get_comment_link( $comment ) ),
      /* translators: %s: comment permalink. */
      esc_attr_x( esc_html_x( 'Comment permalink', 'comment permalink title', 'log-lolla' ) ),
      /* translators: %s: post permalink. */
      esc_html_x( '&infin;', 'post permalink', 'log-lolla' )
    );
  ?>
</aside>
