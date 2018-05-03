<?php
  /**
   * Displaying post title associated to a comment, with arrows
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<h3 class="comment-post-title-with-arrows">
  <?php echo wp_kses_post( log_lolla_get_arrow_html( 'top' ) ) ?>
  <?php echo wp_kses_post( log_lolla_get_arrow_html( 'top' ) ) ?>
  <?php echo wp_kses_post( log_lolla_get_arrow_html( 'top' ) ) ?>

  <?php echo log_lolla_comment_updated_text( $comment ); ?>
</h3>
