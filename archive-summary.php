<?php
	/**
	 * Template for displaying the Summaries archive page
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Log_Lolla_Pro
	 */

get_header(); ?>

	<section class="content content-archive">
		<h3 class="hidden">Archive for Summaries</h3>

		<?php get_template_part( 'template-parts/archive/archive', 'posts' ); ?>
		<?php get_template_part( 'template-parts/archive/archive', 'header' ); ?>
	</section>

	<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
