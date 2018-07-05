<?php
/**
 * Displays an archive page for a date.
 *
 * Date archives needs different code than other archives.
 *
 * @see https://wordpress.stackexchange.com/questions/128685/get-queried-object-returns-null-on-post-date-archive
 *
 * The page contains:
 *  * A Header from the Archive template part.
 *  * A Post list for the posts of the archive from the Post template part.
 *  * A Post list for the Summaries of the archive from the Post template part.
 *  * A Post list for the Standard post types of the archive from the Post template part.
 *  * A Topic list for the related topics from the Topic template part.
 *
 * @link https://morethemes.baby/log-lolla-pro-pro-demo/2018/ Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ Wordpress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content content-archive">
	<h3 class="hidden">Date archive</h3>

	<?php
		$archive = get_queried_object();
	?>

	<?php
		set_query_var( 'post-list-klass', 'posts-of-an-archive' );
		get_template_part( 'template-parts/post/post', 'list' );
	?>

	<?php
		$title = esc_html( 'Summaries', 'log-lolla-pro' );
		$posts = log_lolla_pro_get_post_type_summary_post_list_for_archive( $archive );

		set_query_var( 'post-list-klass', 'summaries' );
		set_query_var( 'post-list-title', $title );
		set_query_var( 'post-list-posts', $posts );
		get_template_part( 'template-parts/post/post-list', 'outside-the-loop' );
	?>

	<?php
		$title = esc_html( 'Thoughts', 'log-lolla-pro' );
		$posts = log_lolla_pro_get_post_format_standard_post_list_for_archive( $archive );

		set_query_var( 'post-list-klass', 'thoughts' );
		set_query_var( 'post-list-title', $title );
		set_query_var( 'post-list-posts', $posts );
		get_template_part( 'template-parts/post/post-list', 'outside-the-loop' );
	?>

	<?php
		$title = esc_html__( 'Related topics ', 'log-lolla-pro' );
		$items = log_lolla_pro_get_topic_post_list_related_to_archive_as_html( $archive );

		set_query_var( 'topic_list_klass', 'topics' );
		set_query_var( 'topic_list_title', $title );
		set_query_var( 'topic_list_items', $items );
		get_template_part( 'template-parts/topic/topic', 'list' );
	?>

	<?php get_template_part( 'template-parts/archive/archive', 'header' ); ?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
