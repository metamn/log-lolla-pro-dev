<?php
  /**
   * Template part for displaying the footer
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

  $klass = '';
?>

<footer class="footer">
  <h3 class="hidden">Footer</h3>

  <?php get_template_part( 'template-parts/footer/footer', 'navigation' ); ?>
  <?php get_template_part( 'template-parts/footer/footer', 'copyright' ); ?>
  <?php get_template_part( 'template-parts/footer/footer', 'credits' ); ?>
</footer>
