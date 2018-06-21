<?php
/**
 * Displays a standard archive page.
 *
 * This is the default archive template.
 * It is used by every other special archive page like the one for the People post type.
 *
 * The page contains:
 *  * A Header from the Archive template part.
 *  * A Post list from the Post template part.
 *  * A Summary from the Archive template part.
 *  * A Related topics list from the Archive template part.
 *
 * @link https://morethemes.baby/log-lolla-pro-pro-demo/tag/indie-web/ Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ Wordpress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content content-archive">
	<h3 class="hidden">Archive</h3>

	<?php
		set_query_var( 'post-list-klass', 'posts-of-an-archive' );
		get_template_part( 'template-parts/post/post', 'list' );
	?>

	<?php
		set_query_var( 'post-list-klass', 'summaries' );
		set_query_var( 'post-list-title', esc_html( 'Summaries ', 'log-lolla-pro') );
		set_query_var( 'post-list-posts', log_lolla_pro_get_summaries_for_archive( get_queried_object() ) );
		get_template_part( 'template-parts/post/post-list', 'outside-the-loop' );
	?>
	<?php //get_template_part( 'template-parts/archive/archive', 'summaries' ); ?>
	<?php get_template_part( 'template-parts/archive/archive', 'standard-posts' ); ?>
	<?php get_template_part( 'template-parts/archive/archive', 'related-topics' ); ?>
	<?php get_template_part( 'template-parts/archive/archive', 'header' ); ?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
