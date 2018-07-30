<?php
/**
 * Displays a standard archive page.
 *
 * This is the default archive template.
 * Special archive pages like the one for the People post type are using another template.
 *
 * The page contains:
 *  * A Header from the Archive template part.
 *  * A Post list for the posts of the archive from the Post template part.
 *  * A Post list for the Summaries of the archive from the Post template part.
 *  * A Post list for the Standard post types of the archive from the Post template part.
 *  * A Topic list for the related topics from the Topic template part.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/tag/indie-web/ Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ Wordpress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content-archive">
	<h3 class="archive-title">Archive</h3>

	<div class="archive-items">
		<?php
			$archive = get_queried_object();
		?>

		<?php
			$title = log_lolla_pro_get_archive_label( 'Posts' );
			set_query_var( 'post-list-title', $title );
			set_query_var( 'post-list-klass', 'for-archive' );
			get_template_part( 'template-parts/post-list/post-list', '' );
		?>

		<?php
			set_query_var( 'archive', $archive );
			get_template_part( 'template-parts/post-list/post-list', 'summaries' );
		?>

		<?php
			$posts = log_lolla_pro_get_post_format_standard_post_list_for_archive( $archive );
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
