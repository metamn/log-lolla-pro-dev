<?php
  /**
   * Displaying comment content or comment excerpt
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

  $klass = '';
?>

<aside class="comment-content-or-excerpt">
  <h3 class="hidden">Comment content or excerpt</h3>

  <?php
    if ( log_lolla_pro_word_count( get_comment_text() ) > 60 ) {
      get_template_part( 'template-parts/comment/parts/comment', 'excerpt' );
    } else {
      get_template_part( 'template-parts/comment/parts/comment', 'content' );
    }
  ?>
</aside>
