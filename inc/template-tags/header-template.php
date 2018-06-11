<?php
  /**
   * Header template tags for this theme
   *
   * Contains custom template tags for the header
   *
   * @link https://codex.wordpress.org/Template_Tags
   *
   * @package Log_Lolla_Pro
   */


if ( ! function_exists( 'log_lolla_header_menu_contents' ) ) {
  /**
  * What goes into the header menu
  *
  * If this function is removed the header menu won't be displayed
  *
  * @return string
  *
  */
  function log_lolla_header_menu_contents() {
    if ( is_active_sidebar( 'sidebar-2' ) ) {
      dynamic_sidebar( 'sidebar-2' );
    } else {
      /* translators: empty header menu text. */
      echo esc_html_x( 'Use the `Header Menu` widget to define what content goes here', 'empty header menu text', 'log-lolla' );
    }
  }
}


if ( ! function_exists( 'log_lolla_header_class' ) ) {
  /**
   * Returns a custom header class
   *
   * @return string
   */
   function log_lolla_header_class() {
     $header_image = get_header_image() ? ' with-header-image' : ' without-header-image';
     $logo = has_custom_logo() ? ' with-logo' : ' without-logo';
     $header_text = display_header_text() ? ' with-header-text' : ' without-header-text';
     $header_menu = function_exists( 'log_lolla_header_menu_contents' ) ? ' with-header-menu' : ' without-header-menu';

     return $header_image . $logo . $header_text . $header_menu;
  }
}

?>
