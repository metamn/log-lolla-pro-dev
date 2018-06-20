<?php
/**
 * Displays the archive page for the Summary post type.
 *
 * The page contains:
 *  * a Header from the Archive template parts
 *  * a Post list from the Archive template parts
 *
 * @link https://morethemes.baby/log-lolla-pro-pro-demo/summaries Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ Wordpress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content content-archive">
	<h3 class="hidden">Archive for Summaries</h3>

	<?php get_template_part( 'template-parts/archive/archive', 'posts' ); ?>
	<?php get_template_part( 'template-parts/archive/archive', 'header' ); ?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
