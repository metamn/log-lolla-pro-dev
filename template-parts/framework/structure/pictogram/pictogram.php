<?php
  /**
   * Displaying a pictogram
   *
   * The corresponding SCSS code can be found in the same folder in `assets/scss/`
   *
   * @package Log_Lolla_Pro
   */
?>


<?php
  $klass = isset( $pictogram['klass'] ) ? $pictogram['klass'] : '';
?>

<div class="pictogram pictogram--<?php echo $klass; ?>">
  <?php get_template_part( 'template-parts/framework/structure/pictogram/parts/pictogram', 'icon' ); ?>
  <?php get_template_part( 'template-parts/framework/structure/pictogram/parts/pictogram', 'number' ); ?>
  <?php get_template_part( 'template-parts/framework/structure/pictogram/parts/pictogram', 'text' ); ?>
</div>
