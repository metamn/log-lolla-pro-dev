<?php

/**
 * Custom shortcodes
 *
 * @link https://codex.wordpress.org/Shortcode_API
 *
 * @package Log_Lolla
 */


if ( ! function_exists( 'log_lolla_create_custom_shortcode_topics_summary' ) ) {
  /**
   * Display topics summary
   *
   * Usage: [log-lolla-topics-summary categories="5" tags="3"]
   *
   * Displays a text / paragraph containing all the category and tag descriptions merged together
   * @link https://github.com/metamn/log-lolla-pro-dev/issues/15
   *
   * @param  Array $attributes The attributes of the shortcode
   * @return string            HTML
   */
  function log_lolla_create_custom_shortcode_topics_summary( $attributes ) {
    // Default attributes
    $default_attributes = array(
      'categories' => 5,
      'tags' => 5
    );

    // Parse attributes
    $attrs = shortcode_atts( $default_attributes, $attributes );

    return log_lolla_display_topics_summary( $attrs['categories'], $attrs['tags'] );
  }

  add_shortcode( 'log-lolla-topics-summary', 'log_lolla_create_custom_shortcode_topics_summary' );
}


if (! function_exists( 'log_lolla_create_custom_shortcode_person' ) ) {
  /**
   * Create custom shortcode for persons
   *
   * Usage: [log-lolla-person name="John Doe"]
   *
   * It needs the People custom post type
   *
   * @param  Array $attributes The attributes of the shortcode
   * @return string            HTML
   */
  function log_lolla_create_custom_shortcode_person( $attributes ) {
    // Default attributes
    $default_attributes = array(
      'name' => 'The person name'
    );

    // Parse attributes
    $attrs = shortcode_atts( $default_attributes, $attributes );

    // Display the person
    $person = get_page_by_title( $attrs['name'], OBJECT, 'people');
    return log_lolla_display_person( $person, $attrs['name'] );
  }

  add_shortcode( 'log-lolla-person', 'log_lolla_create_custom_shortcode_person' );
}

?>
