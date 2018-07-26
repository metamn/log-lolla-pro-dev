<?php
/**
 * Displays a 404 page (not found).
 *
 * The page contains:
 *  * a 'not found' message
 *  * a search form.
 *
 * @link https://morethemes.baby/log-lolla-pro-demo/peoplexx Live example
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page Wordpress documentation
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

get_header();
?>

<section class="content-none">
	<h3 class="hidden">Page not found</h3>

	<article class="post">
		<h3 class="post-title">
			<span class="text">
				<?php
				/* translators: The not found (404) page title */
				echo esc_html_x( 'Oops! That page can&rsquo;t be found.', 'The not found (404) page title', 'log-lolla-pro' );
				?>
			</span>
		</h3>

		<aside class="post-content">
			<h3 class="hidden">Article content</h3>

			<div class="text">
				<?php
				/* translators: The not found (404) page text */
				echo esc_html_x( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'The not found (404) page text', 'log-lolla-pro' );
				?>
			</div>
		</aside>

		<aside class="search">
			<h3 class="hidden">Search form</h3>

			<?php get_search_form(); ?>
		</aside>
	</article>
</section>

<?php get_footer(); ?>
