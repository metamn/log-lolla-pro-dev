<?php
  /**
   * Displaying archive title and description
   *
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<aside class="archive-title-and-description">
  <h3 class="hidden">Archive title and description</h3>

  <div class="archive-artwork">
    <div class="circle">
    </div>
  </div>

  <div class="archive-text">
    <?php get_template_part( 'template-parts/archive/parts/archive', 'title' ); ?>
    <?php get_template_part( 'template-parts/archive/parts/archive', 'description' ); ?>
  </div>
</aside>
