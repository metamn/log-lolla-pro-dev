<?php
/**
 * Template for displaying the sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Log_Lolla_Pro
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

dynamic_sidebar( 'sidebar-1' );
