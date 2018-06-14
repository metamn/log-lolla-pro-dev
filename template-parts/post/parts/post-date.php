<?php
  /**
   * Displaying post date
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

  $klass = '';
?>

<aside class="post-date">
  <h3 class="hidden">Article date</h3>

  <div class="posted-on">
    <time class="date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) )?>">
      <?php echo esc_html( get_the_date() ) ?>
    </time>
  </div>
</aside>
