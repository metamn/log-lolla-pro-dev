<?php
/**
 * Template Name: Categories Page
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Log_Lolla
 */
?>

<?php get_header() ?>


<section class="content content-archive">
  <h3 class="archive-title">
    <?php esc_html_e( 'Categories', 'log-lolla-pro' ); ?>
  </h3>

  <?php get_template_part( 'template-parts/breadcrumb/breadcrumb', 'archives' ); ?>
  <?php get_template_part( 'template-parts/topic/topic', 'archive' ); ?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php get_footer() ?>
