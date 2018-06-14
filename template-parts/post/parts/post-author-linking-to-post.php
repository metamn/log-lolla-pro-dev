<?php
  /**
   * Displaying post author linking to the post
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

  $klass = '';
?>

<aside class="post-author-linking-to-post">
  <h3 class="hidden">Article author linking to post</h3>

  <?php echo wp_kses_post( log_lolla_get_arrow_html( 'top' ) ) ?>
  <?php echo wp_kses_post( log_lolla_get_arrow_html( 'top' ) ) ?>
  <?php echo wp_kses_post( log_lolla_get_arrow_html( 'top' ) ) ?>

  <div class="byline">
    <span class="author vcard">
      <a class="link" href="<?php echo esc_url( get_permalink() ) ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0') ) ?>">
        <?php /* translators: %s: status update by. */ ?>
        <?php echo esc_html_x( 'status update by ', 'status update by', 'log-lolla' ) ?>
        <?php echo esc_html( get_the_author() ) ?>
      </a>
    </span>
  </div>
</aside>
