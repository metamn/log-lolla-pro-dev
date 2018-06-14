<?php
  /**
   * Displaying an arrow with triangle
   *
   * The corresponding SCSS code can be found in `assets/scss/framework/design/decorations`
   *
   * @package Log_Lolla_Pro
   */

  $arrow_direction = get_query_var( 'arrow_direction' );
?>

<span class="arrow-with-triangle arrow-with-triangle--<?php echo $arrow_direction ?>">
  <span class="arrow-with-triangle__line"></span>

  <?php set_query_var( 'triangle_direction', $arrow_direction ) ?>
  <?php set_query_var( 'triangle_klass', 'arrow-with-triangle__triangle' ) ?>
  <?php get_template_part( 'template-parts/framework/design/decorations/triangle/triangle', '' ); ?>
</span>
