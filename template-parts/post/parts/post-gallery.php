<?php
  /**
   * Displaying post gallery
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

  $klass = '';
?>

<aside class="post-gallery">
  <h3 class="hidden">Article gallery</h3>

  <?php
    if ( get_post_gallery() ) :
      echo get_post_gallery();
    endif;
  ?>
</aside>
