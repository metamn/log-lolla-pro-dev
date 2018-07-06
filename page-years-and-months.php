<?php
/**
 * Template Name: Years and months Page
 *
 * Template to display a yearly / monthly archive.
 *
 * The page contains:
 *  * A Header from the Topic template parts.
 *  * Two Topic lists from the Topic template parts. One for categories, one for tags.
 *
 * @link https://morethemes.baby/log-lolla-pro-pro-demo/years-and-months Live example
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/ WordPress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>


<section class="content content-archive">
	<h3 class="hidden">Years and months archive</h3>

	<?php echo do_shortcode( '[log-lolla-pro-archives]' ); ?>

	<?php
	/* translators: Years and months Archive page name */
	$title = esc_html_x( 'Years and months', 'Years and months Archive page name', 'log-lolla-pro' );

	set_query_var( 'archive_title', $title );
	get_template_part( 'template-parts/archive/archive', 'header' );
	?>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php get_footer(); ?>