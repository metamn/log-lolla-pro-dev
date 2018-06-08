<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla
 */

get_header(); ?>

	<section class="content content-archive">
		<?php get_template_part( 'template-parts/archive/archive', 'posts' ); ?>
		<?php get_template_part( 'template-parts/archive/archive', 'summaries' ); ?>
		<?php get_template_part( 'template-parts/archive/archive', 'standard-posts' ); ?>
		<?php get_template_part( 'template-parts/archive/archive', 'related-topics' ); ?>
		<?php get_template_part( 'template-parts/archive/archive', 'header' ); ?>
	</section>

	<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
