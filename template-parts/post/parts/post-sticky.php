<?php
/**
 * Displaying a sticky post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 */

if ( is_sticky() ) {
	?>
	<div class="post-sticky">
		<span class="text">
		<?php
		/* translators: The `Featured` text for the Sticky posts. */
		echo esc_html_x( 'Featured', 'sticky post text', 'log-lolla-pro' );
		?>
		</span>
	</div>
	<?php
}
?>
