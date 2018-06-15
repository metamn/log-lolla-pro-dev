<?php
  /**
   * Displaying comment content
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

  $text = get_comment_text();
?>

<aside class="comment-content">
  <h3 class="hidden">Comment content</h3>

  <div class="text">
    <?php echo $text; ?>
  </div>
</aside>
