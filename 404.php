<?php
	/**
	 * Displays a 404 page (not found)
	 *
	 * Displays a page not found message and a search form
	 *
	 * @link https://morethemes.baby/log-lolla-pro-pro-demo/peoplexxx Live example
	 * @link https://codex.wordpress.org/Creating_an_Error_404_Page Wordpress documentation
	 *
	 * @package Log_Lolla_Pro
	 * @since 1.0.0
	 */

	get_header();
?>

	<section class="content content-none">
		<h3 class="hidden">Page not found</h3>

		<article class="post">
			<h3 class="post-title">
				<span class="text">
					<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'log-lolla-pro' ); ?>
				</span>
			</h3>

			<aside class="post-content">
				<h3 class="hidden">Article content</h3>

				<div class="text">
					<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'log-lolla-pro' ); ?>
				</div>
			</aside>

			<aside class="search">
				<h3 class="hidden">Search form</h3>

				<?php get_search_form(); ?>
			</aside>
		</article>
	</section>

	<?php
		get_template_part( 'template-parts/sidebar/sidebar' );
	?>

<?php
get_footer();
