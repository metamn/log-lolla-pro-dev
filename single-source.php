<?php
  /**
   * Template to display an archive of a single source
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla_Pro
   */

get_header(); ?>

<section class="content content-archive">
  <h3 class="hidden">Single source archive</h3>

  <?php
    get_template_part( 'template-parts/post-type/post-type', 'posts' );
    get_template_part( 'template-parts/post-type/post-type', 'related-topics' );
    get_template_part( 'template-parts/post-type/post-type', 'header' );
  ?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
