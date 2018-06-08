<?php
  /**
   * Displaying an archive counter
   *
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<div class="archive-counter">
  <?php get_template_part( 'template-parts/framework/structure/pictogram/pictogram', '' ); ?>

  <?php set_query_var( 'arrow_direction', 'bottom' ); ?>
  <?php get_template_part( 'template-parts/framework/design/decorations/arrow-with-triangle/arrow-with-triangle', '' ); ?>
</div>
