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

<section class="content content-archive">
	<h3 class="hidden">Post formats archive</h3>

	<?php echo do_shortcode( '[log-lolla-pro-post-formats]' ); ?>

	<?php
	/* translators: Post Formats Archive page name */
	$title = esc_html_x( 'Post Formats', 'Post Formats Archive page name', 'log-lolla-pro' );

	set_query_var( 'archive_title', $title );
	get_template_part( 'template-parts/archive/archive', 'header' );
	?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
