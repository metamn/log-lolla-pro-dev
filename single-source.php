<?php
/**
 * The template for displaying a source
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Log_Lolla
 */

get_header(); ?>

  <?php get_template_part( 'template-parts/breadcrumb/breadcrumb', 'archives' ); ?>

  <section class="content content-single">
    <h3 class="hidden">Content</h3>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/source/source', 'single' );
      get_template_part( 'template-parts/source/source', 'posts' );

			get_template_part( 'template-parts/navigation/navigation', 'post' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
  </section>

  <?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
