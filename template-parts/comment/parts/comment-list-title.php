<?php
  /**
   * Displaying the title of a comment list
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */

  $klass = '';
?>

<h3 class="comments-title">
  <?php
    $text = '';

    $number_of_comments = get_query_var( 'number_of_comments' );

    if ( $number_of_comments === 1) {
      /* translators: %s: 1 comment. */
      $text = esc_html_x( 'One update', 'one comment', 'log-lolla');
    } else {
      /* translators: %s: comments. */
      $text = $number_of_comments . esc_html_x( ' updates', ' comments', 'log-lolla' );
    }

    $arrows = log_lolla_get_arrow_html( 'bottom' );
    $arrows .= log_lolla_get_arrow_html( 'bottom' );
    $arrows .= log_lolla_get_arrow_html( 'bottom' );

    printf(
      '<span class="arrows">%1$s</span><span class="number-of-comments">%2$s</span><span class="arrows">%3$s</span>',
      $arrows,
      $text,
      $arrows
    );
  ?>
</h3>
