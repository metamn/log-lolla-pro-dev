<?php
/**
 * The template for displaying a single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Log_Lolla_Pro
 */

get_header(); ?>

  <section class="content content-single">
    <h3 class="hidden">Single post</h3>

		<?php
  		while ( have_posts() ) : the_post();
  			get_template_part( 'template-parts/post/post', 'single' );
        get_template_part( 'template-parts/post/parts/post', 'footer' );
        get_template_part( 'template-parts/comment/comment', 'list' );
  			get_template_part( 'template-parts/navigation/navigation', 'post' );
  		endwhile; // End of the loop.
		?>
  </section>

  <?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
