<?php
  /**
   * Header template tags for this theme
   *
   * Contains custom template tags for the header
   *
   * @link https://codex.wordpress.org/Template_Tags
   *
   * @package Log_Lolla
   */
?>

<?php

if ( ! function_exists( 'log_lolla_header_menu_contents' ) ) {
  /**
  * What goes into the header menu
  * If this function is removed the header menu won't be displayed
  *
  * Example code for Header Menu
  *
  * <a href="#sidebar">
     	<span class="text">Archives</span>
     	<div class="arrows" style="display:flex;flex-wrap:wrap">
     		<span class="arrow-with-triangle arrow-with-triangle--bottom">
      					  	<span class="arrow-with-triangle__line"></span>
      					  	<span class="triangle triangle-- arrow-with-triangle__triangle"></span>
      						</span>
     		<span class="arrow-with-triangle arrow-with-triangle--bottom">
      					  	<span class="arrow-with-triangle__line"></span>
      					  	<span class="triangle triangle-- arrow-with-triangle__triangle"></span>
      						</span>
     		<span class="arrow-with-triangle arrow-with-triangle--bottom">
      					  	<span class="arrow-with-triangle__line"></span>
      					  	<span class="triangle triangle-- arrow-with-triangle__triangle"></span>
      						</span>
     	</div>
     </a>
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


 if ( ! function_exists( 'log_lolla_hamburger_icon' ) ) {
   /**
    * Return HTML markup for hamburger icon
    *
    * @return string
    *
    */
    function log_lolla_hamburger_icon() {
    	echo '<span class="icon">&#x2630;</span>';
    }
 }


 if ( ! function_exists( 'log_lolla_hamburger_icon_x' ) ) {
   /**
    * Return HTML markup for hamburger icon X
    *
    * @return string
    */
    function log_lolla_hamburger_icon_x() {
   	 echo '<span class="icon">&times;</span>';
    }
 }


?>
