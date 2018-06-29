<?php
/**
 * Displays the post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 */

$klass = '';
?>

<aside class="post-content">
	<h3 class="hidden">Article content</h3>

	<div class="text">
		<?php
		if ( is_single() ) {
			the_content();
		} else {
			/**
			 * Remove `<p>` and `<br>` tags added by WordPress.
			 * If not, the 'Continue reading -->' arrow will be completely broken.
			 *
			 * @link https://wordpress.stackexchange.com/questions/130075/stop-wordpress-automatically-adding-br-tags-to-post-content
			 */
			remove_filter( 'the_content', 'wpautop' );
			the_content( log_lolla_pro_add_readmore_to_content() );
		}
		?>
	</div>
</aside>
