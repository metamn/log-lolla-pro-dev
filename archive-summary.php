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
		<?php get_template_part( 'template-parts/archive/archive', '' ); ?>
	</section>

	<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
