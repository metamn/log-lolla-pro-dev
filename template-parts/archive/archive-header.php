<?php
  /**
   * Template part to display archive header
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<header class="archive-header">
  <?php get_template_part( 'template-parts/breadcrumb/breadcrumb', 'archives' ); ?>
  <?php get_template_part( 'template-parts/archive/parts/archive', 'title-and-description' ); ?>
  <?php get_template_part( 'template-parts/archive/parts/archive', 'counters' ); ?>
</header>
