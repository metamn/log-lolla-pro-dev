<?php
/**
 * The template for displaying archive pages for Summaries
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla
 */

get_header(); ?>

	<section class="content content-archive">
	  <?php get_template_part( 'template-parts/archive/parts/archive', 'title' ); ?>
    <?php get_template_part( 'template-parts/archive/parts/archive', 'description' ); ?>
		<?php get_template_part( 'template-parts/breadcrumb/breadcrumb', 'archives' ); ?>

		<div class="archive-list">
			<?php
	      if ( have_posts() ) {
	        while ( have_posts() ) {
	          the_post();
	          get_template_part( 'template-parts/summary/summary' );
	        }

	        get_template_part( 'template-parts/navigation/navigation', 'posts' );
	      } else {
	        get_template_part( 'template-parts/post/post', 'none' );
	      }
	    ?>
		</div>
	</section>

	<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
