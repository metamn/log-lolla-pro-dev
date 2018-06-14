<?php
  /**
   * Displaying post title associated to a comment
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */

  $klass = '';
?>

<a class="link" href="<?php echo esc_url( get_comment_link( $comment ) ) ?>" title="<?php echo esc_html( get_the_title( $comment->comment_post_ID ) ) ?>">
  <?php echo esc_html( get_the_title( $comment->comment_post_ID ) ) ?>
</a>
