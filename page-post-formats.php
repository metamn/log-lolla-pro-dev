<?php
/**
 * Template Name: Post Formats Archive
 *
 * Template to display the Post Formats archive.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content-archive archive archive-post-format">
	<h3 class="archive-title">Post formats archive</h3>

	<div class="archive-items">
		<?php echo do_shortcode( '[log-lolla-pro-post-formats]' ); ?>

		<?php
		$title = log_lolla_pro_get_post_format_label( 'Post Formats' );

		set_query_var( 'archive_title', $title );
		get_template_part( 'template-parts/archive-header/archive-header', 'without-counters' );
		?>
	</div>
</section>

<?php
get_footer();
