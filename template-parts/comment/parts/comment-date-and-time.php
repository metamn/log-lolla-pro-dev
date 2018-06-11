<?php
  /**
   * Displaying comment date
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<aside class="comment-date-and-time">
  <h3 class="hidden">Comment date</h3>

  <?php
    printf(
     '<div class="posted-on"><time class="date published" datetime="%1$s">%2$s</time></div>',
     esc_attr( get_comment_date( 'c' ) . ', ' .  get_comment_time( 'c' ) ),
     esc_html( get_comment_date() . ', ' . get_comment_time() )
   );
  ?>
</aside>
