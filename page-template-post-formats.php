<?php
/**
 * Template Name: Post Formats Archive Template
 *
 * Template to display the Post Formats archive.
 *
 * * The page contains:
 *  * A Header from the Archive template part.
 *  * The display of the `log-lolla-pro-post-formats` shortcode.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="archive archive-for-post-formats">
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
