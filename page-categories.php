<?php
  /**
   * Template Name: Categories Page
   *
   * Template to display a page of categories
   * It will be similar like `page-tags`
   *
   * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
   *
   * @package Log_Lolla_Pro
   */
?>

<?php get_header() ?>


<section class="content content-archive">
  <h3 class="hidden">Category archive</h3>

  <?php
    set_query_var( 'term', 'category' );
    get_template_part( 'template-parts/topic/topic', 'list' );

    get_template_part( 'template-parts/topic/topic', 'header' );
  ?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php get_footer() ?>
