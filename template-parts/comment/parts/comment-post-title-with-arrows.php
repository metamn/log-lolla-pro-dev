<?php
  /**
   * Displaying post title associated to a comment, with arrows
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<aside class="comment-post-title-with-arrows">
  <?php echo log_lolla_comment_updated_text( $comment ); ?>

  <?php echo wp_kses_post( log_lolla_get_arrow_html( 'bottom' ) ) ?>
  <?php echo wp_kses_post( log_lolla_get_arrow_html( 'bottom' ) ) ?>
  <?php echo wp_kses_post( log_lolla_get_arrow_html( 'bottom' ) ) ?>
</aside>
