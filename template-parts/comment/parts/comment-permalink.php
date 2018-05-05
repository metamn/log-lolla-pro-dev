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
  <h3 hidden>Comment permalink</h3>

  <?php log_lolla_comment_permalink( $comment ); ?>
</aside>
