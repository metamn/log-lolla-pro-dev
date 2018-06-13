<?php
  /**
   * Display archive header
   *
   *
   * @package Log_Lolla_Pro
   */
?>

<header class="archive-header">
  <?php get_template_part( 'template-parts/breadcrumb/breadcrumb', 'archives' ); ?>
  <?php get_template_part( 'template-parts/archive/parts/archive', 'title-and-description' ); ?>
  <?php get_template_part( 'template-parts/archive/parts/archive', 'counters' ); ?>
</header>
