<?php
  /**
   * Displaying post content
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

  $klass = '';
?>

<aside class="post-content">
  <h3 class="hidden">Article content</h3>

  <div class="text">
    <?php
      the_content( log_lolla_add_readmore_to_content() );
    ?>
  </div>
</aside>
