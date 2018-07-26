<?php
/**
 * Template Name: Standard Post Format Archive
 *
 * Template to display the Standard Post format archive.
 *
 * By default WordPress has no archive for Standard post formats.
 * We should create a page titled `Post Format Standard` and use this template to show Standard Post format archives.
 *
 * In `inc/template-functions` we have a rewrite rule to map `post-format/standard` to this page.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content content-archive">
	<h3 class="archive-title">Archive for Standard post format</h3>

	<div class="archive-items">
		<?php
			$archive = get_queried_object();
		?>

		<?php
			$posts = log_lolla_pro_get_post_format_standard_post_list();
			set_query_var( 'posts', $posts );
			get_template_part( 'template-parts/post-list/post-list', 'thoughts' );
		?>

		<?php
			set_query_var( 'archive', $archive );
			get_template_part( 'template-parts/post-list/post-list', 'summaries' );
		?>

		<?php
			set_query_var( 'related-to', $archive );
			get_template_part( 'template-parts/topic-list/topic-list', 'related-topics' );
		?>

		<?php
			$title = log_lolla_pro_get_post_format_label( 'Standard' );
			set_query_var( 'archive_title', $title );
			get_template_part( 'template-parts/archive-header/archive-header', '' );
		?>
	</div>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
