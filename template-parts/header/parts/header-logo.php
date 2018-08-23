<?php
/**
 * Displays the header logo.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( has_custom_logo() ) {
	?>
	<aside class="header-logo">
		<h3 class="hidden">Logo</h3>

		<figure class="logo">
			<?php
			if ( function_exists( 'the_custom_logo' ) ) {
				the_custom_logo();
			}
			?>
		</figure>
	</aside>
	<?php
}
