<?php
/**
 * Displays a Person's page (a single People page).
 *
 * The page contains:
 *  * A Header from the Archive template tag
 *  * A Post list from the Post template tag
 *  * A Topic list from the Topic template tag
 *
 * @link https://morethemes.baby/log-lolla-pro-pro-demo/people/ben-thompson/ Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ WordPress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content content-archive">
	<h3 class="hidden">Single person archive</h3>

	<?php
	get_template_part( 'template-parts/post/post-list', 'post-type' );

	$archive = get_queried_object();

	// Convert post to archive.
	$archive->taxonomy = 'post_tag';
	$archive->slug     = $archive->post_name;

	$title = esc_html( 'Summaries', 'log-lolla-pro' );
	$posts = log_lolla_pro_get_post_type_summary_post_list_for_archive( $archive );

	set_query_var( 'post-list-klass', 'summaries' );
	set_query_var( 'post-list-title', $title );
	set_query_var( 'post-list-posts', $posts );
	get_template_part( 'template-parts/post/post-list', 'outside-the-loop' );

	get_template_part( 'template-parts/topic/topic-list', 'post-type-related' );
	get_template_part( 'template-parts/archive/archive-header', 'post-type' );
	?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
