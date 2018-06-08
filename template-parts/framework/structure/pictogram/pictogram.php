<?php
  $klass = isset( $pictogram['klass'] ) ? $pictogram['klass'] : '';
?>

<div class="pictogram pictogram--<?php echo $klass; ?>">
  <?php get_template_part( 'template-parts/framework/structure/pictogram/parts/pictogram', 'icon' ); ?>
  <?php get_template_part( 'template-parts/framework/structure/pictogram/parts/pictogram', 'number' ); ?>
  <?php get_template_part( 'template-parts/framework/structure/pictogram/parts/pictogram', 'text' ); ?>
</div>
