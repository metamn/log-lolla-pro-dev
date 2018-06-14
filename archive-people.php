<?php
	/**
	 * Displays the archive page for the People post type
	 *
	 * @uses ::archive-source.html Archive source
	 *
	 * @link https://morethemes.baby/log-lolla-pro-demo/people Live example
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ Wordpress documentation
	 *
	 * @package Log_Lolla_Pro
	 * @since 1.0.0
	 */

get_header(); ?>

	<section class="content content-archive">
		<h3 class="hidden">Archive for People</h3>

		<?php get_template_part( 'template-parts/archive/archive', 'posts' ); ?>
		<?php get_template_part( 'template-parts/archive/archive', 'header' ); ?>
	</section>

	<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
