<?php
  /**
   * Displaying post permalink
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

  $klass = '';
?>

<aside class="post-permalink">
  <h3 class="hidden">Article permalink</h3>

  <div class="permalink">
    <a class="link" href="<?php echo esc_url( get_permalink() ) ?>" title="<?php echo the_title_attribute( 'echo=0' ) ?>">
      <?php /* translators: %s: post permalink. */ ?>
      <?php echo esc_html_x( '&infin;', 'post permalink', 'log-lolla' ) ?>
    </a>
  </div>

</aside>
