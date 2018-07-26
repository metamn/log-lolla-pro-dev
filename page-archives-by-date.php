<?php
/**
 * Template Name: Archives by date Page
 *
 * Template to display a yearly / monthly archive.
 *
 * The page contains:
 *  * A Header from the Topic template parts.
 *  * Two Topic lists from the Topic template parts. One for categories, one for tags.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/years-and-months Live example
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/ WordPress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>


<section class="content content-archive">
	<h3 class="archive-title">Archives by date</h3>

	<div class="archive-items">
		<?php echo do_shortcode( '[log-lolla-pro-archives-by-date]' ); ?>

		<?php
		$title = log_lolla_pro_get_archive_label( 'Archives by date' );
		set_query_var( 'archive_title', $title );
		get_template_part( 'template-parts/archive-header/archive-header', 'without-counters' );
		?>
	</div>
</section>

<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php get_footer(); ?>
