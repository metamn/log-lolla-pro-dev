<?php
/**
 * Header template tags
 *
 * @link https://codex.wordpress.org/Template_Tags
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( ! function_exists( 'log_lolla_pro_display_header_menu_contents' ) ) {
	/**
	 * Displays the contents of the menu in the header
	 *
	 * If this function is removed the header menu won't be displayed.
	 */
	function log_lolla_pro_display_header_menu_contents() {
		if ( is_active_sidebar( 'sidebar-2' ) ) {
			dynamic_sidebar( 'sidebar-2' );
		} else {
			/* translators: empty header menu text. */
			echo esc_html_x( 'Use the `Header Menu` widget to define what content goes here', 'empty header menu text', 'log-lolla-pro' );
		}
	}
}


if ( ! function_exists( 'log_lolla_pro_get_header_class' ) ) {
	/**
	 * Returns a custom header class
	 *
	 * @return string
	 */
	function log_lolla_pro_get_header_class() {
		$header_image = get_header_image() ? ' with-header-image' : ' without-header-image';
		$logo         = has_custom_logo() ? ' with-logo' : ' without-logo';
		$header_text  = display_header_text() ? ' with-header-text' : ' without-header-text';
		$header_menu  = function_exists( 'log_lolla_pro_display_header_menu_contents' ) ? ' with-header-menu' : ' without-header-menu';

		return $header_image . $logo . $header_text . $header_menu;
	}
}
