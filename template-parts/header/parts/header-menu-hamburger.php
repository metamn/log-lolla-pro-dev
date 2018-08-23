<?php
/**
 * Displays a navigation menu icon (hamburger menu) in the header.
 *
 * It is only displayed if there is a custom function to provide content for the header menu
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( function_exists( 'log_lolla_pro_display_header_menu_contents' ) ) {
	?>
	<nav class="header-menu-hamburger header-menu-hamburger--closed">
		<h3 class="hidden">Hamburger Menu Icon</h3>

		<div class="header-menu-hamburger-icon header-menu-hamburger-icon--closed">
			<span class="icon">&#x2630;</span>
		</div>

		<div class="header-menu-hamburger-icon header-menu-hamburger-icon--opened">
			<span class="icon">&times;</span>
		</div>
	</nav>
	<?php
}
