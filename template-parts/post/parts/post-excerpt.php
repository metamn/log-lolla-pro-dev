<?php
  /**
   * Displaying post excerpt
   * Only If the post has an excerpt defined, and we are on an archive page
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<aside class="post-excerpt">
  <h3 class="hidden">Article excerpt</h3>

  <div class="text">
    <?php the_excerpt(); ?>
  </div>
</aside>
