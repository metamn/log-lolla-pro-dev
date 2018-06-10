<?php
/**
 * Template for displaying a person
 *
 * This template is 100% similar to the `single-source` template
 *
 * @package Log_Lolla_Pro
 */

get_header(); ?>

<section class="content content-archive">
  <h3 class="hidden">Archive</h3>

  <?php
    get_template_part( 'template-parts/source/source', 'posts' );

    $topic = get_term_by( 'slug', $post->post_name, 'post_tag' );
    set_query_var( 'topic', $topic );
    get_template_part( 'template-parts/archive/archive', 'related-topics' );

    get_template_part( 'template-parts/source/source', 'header' );
  ?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
