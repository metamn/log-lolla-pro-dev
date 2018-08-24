<?php
/**
 * Displays an archive page for a date.
 *
 * Date archives needs different code than other archives. @see https://wordpress.stackexchange.com/questions/128685/get-queried-object-returns-null-on-post-date-archive
 *
 * The page contains:
 *  * A Header from the Archive template part.
 *  * A Post list for the posts of the archive from the Post template part.
 *  * A Post list for the Summaries of the archive from the Post template part.
 *  * A Post list for the Standard post types of the archive from the Post template part.
 *  * A Topic list for the related topics from the Topic template part.
 *
 * @link https://morethemes.baby/blog/2018/ Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ Wordpress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="archive archive-for-date">
	<h3 class="archive-title">Date archive</h3>

	<div class="archive-items">
		<?php
			$archive = log_lolla_pro_get_archive_object_for_date_archives();
		?>

		<?php
			$post_list_query_vars = array(
				'title' => log_lolla_pro_get_archive_label( 'Posts' ),
				'klass' => 'for-archive',
			);
			set_query_var( 'post-list-query-vars', $post_list_query_vars );
			get_template_part( 'template-parts/post-list/post-list', '' );
			?>

		<?php
			set_query_var( 'archive', $archive );
			get_template_part( 'template-parts/post-list/post-list', 'summaries' );
		?>

		<?php
			$posts = log_lolla_pro_get_post_format_standard_post_list_for_date_archive( $archive );
			set_query_var( 'posts', $posts );
			get_template_part( 'template-parts/post-list/post-list', 'thoughts' );
		?>

		<?php
			set_query_var( 'related-to', $archive );
			get_template_part( 'template-parts/topic-list/topic-list', 'related-topics' );
		?>

		<?php get_template_part( 'template-parts/archive-header/archive-header', '' ); ?>
	</div>
</section>

<?php
get_footer();
