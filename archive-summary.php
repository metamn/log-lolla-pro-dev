<?php
/**
 * Displays the archive page for the Summary post type.
 *
 * The page contains:
 *  * A Header from the Archive template part.
 *  * A Post list from the Post template part.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/summaries Live example
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ Wordpress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content-archive">
	<h3 class="archive-title">Archive for Summaries</h3>

	<div class="archive-items">
		<?php
			$title = log_lolla_pro_get_archive_label( 'Posts' );
			set_query_var( 'post-list-title', $title );
			set_query_var( 'post-list-klass', 'for-archive' );
			set_query_var( 'post-list-post-format', 'summary' );
			get_template_part( 'template-parts/post-list/post-list', '' );
		?>

		<?php get_template_part( 'template-parts/archive-header/archive-header', 'without-counters' ); ?>
	</div>
</section>

<?php
get_footer();
