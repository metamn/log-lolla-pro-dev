<?php
/**
 * Template for displaying a single source
 *
 * It will be displayed as an archive since it is an archive of posts from a source
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Log_Lolla_Pro
 */

get_header(); ?>

<section class="content content-archive">
  <h3 class="hidden">Archive</h3>

  <?php get_template_part( 'template-parts/source/source', 'posts' ); ?>
  <?php get_template_part( 'template-parts/archive/archive', 'header' ); ?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
