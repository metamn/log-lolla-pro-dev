<?php
/**
 * Displays the sidebar.
 *
 * The sidebar is a set of widgets added to the Sidebar section in the Appearance screen in the WordPress administration backend.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

dynamic_sidebar( 'sidebar-1' );
