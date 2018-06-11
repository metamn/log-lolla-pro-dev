<?php
/**
 * Template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Log_Lolla_Pro
 */

get_header(); ?>

	<section class="content content-none">
		<h3 class="hidden">Page not found</h3>

		<article class="post">
			<h3 class="post-title">
				<span class="text">
					<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'log-lolla' ); ?>
				</span>
			</h3>

			<aside class="post-content">
			  <h3 class="hidden">Article content</h3>

			  <div class="text">
			    <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'log-lolla' ); ?>
			  </div>
			</aside>

			<aside class="search">
				<h3 class="hidden">Search form</h3>

				<?php get_search_form(); ?>
			</aside>
		</article>
	</section>

	<?php get_template_part( 'template-parts/sidebar/sidebar' ); ?>

<?php
get_footer();
