<?php
  /**
   * Displaying post author
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<aside class="post-author">
  <h3 class="hidden">Article author</h3>

  <div class="byline">
    <?php  /* translators: %s: post author. */ ?>
    <?php echo esc_html_x( 'by', 'post author', 'log-lolla' ) ?>
    <span class="author vcard">
      <a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">
        <?php echo esc_html( get_the_author() ) ?>
      </a>
    </span>
  </div>
</aside>
