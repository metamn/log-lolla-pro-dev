<?php
  /**
   * Custom shortcodes
   *
   * @link https://codex.wordpress.org/Shortcode_API
   *
   * @package Log_Lolla
   */


if (! function_exists( 'log_lolla_create_custom_shortcode_sources' ) ) {
  /**
   * Display sources archive
   *
   * Usage: [log-lolla-sources sources="5"]
   *
   * @param  Array $attributes The attributes of the shortcode
   * @return string            HTML
   */
  function log_lolla_create_custom_shortcode_sources( $attributes ) {
    // Default attributes
    $default_attributes = array(
      'sources' => 5
    );

    // Parse attributes
    $attrs = shortcode_atts( $default_attributes, $attributes );

    // Content
    $content = log_lolla_display_sources_with_post_count( $attrs['sources'] );

    return log_lolla_display_shortcode( esc_html__( 'Sources', 'log-lolla' ), $content );
  }

  add_shortcode( 'log-lolla-sources', 'log_lolla_create_custom_shortcode_sources' );
}



if (! function_exists( 'log_lolla_create_custom_shortcode_post_formats' ) ) {
  /**
   * Display post formats archive
   *
   * Usage: [log-lolla-post-formats]
   *
   * @param  Array $attributes The attributes of the shortcode
   * @return string            HTML
   */
  function log_lolla_create_custom_shortcode_post_formats( $attributes ) {
    // Default attributes
    $default_attributes = array(
    );

    // Parse attributes
    $attrs = shortcode_atts( $default_attributes, $attributes );

    // Content
    $content = log_lolla_display_post_formats_with_post_count();

    return log_lolla_display_shortcode( esc_html__( 'Post formats', 'log-lolla' ), $content );
  }

  add_shortcode( 'log-lolla-post-formats', 'log_lolla_create_custom_shortcode_post_formats' );
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



if (! function_exists( 'log_lolla_create_custom_shortcode_people' ) ) {
  /**
   * Display most popular people
   *
   * Usage: [log-lolla-people people="5"]
   *
   * @param  Array $attributes The attributes of the shortcode
   * @return string            HTML
   */
  function log_lolla_create_custom_shortcode_people( $attributes ) {
    // Default attributes
    $default_attributes = array(
      'people' => 5
    );

    // Parse attributes
    $attrs = shortcode_atts( $default_attributes, $attributes );

    // Content
    $content = log_lolla_display_people_with_post_count( $attrs['people'] );

    return log_lolla_display_shortcode( esc_html__( 'People', 'log-lolla' ), $content );
  }

  add_shortcode( 'log-lolla-people', 'log_lolla_create_custom_shortcode_people' );
}




if (! function_exists( 'log_lolla_create_custom_shortcode_topics' ) ) {
  /**
   * Display popular topics (categories, tags)
   *
   * Usage: [log-lolla-topics categories="5" tags="3"]
   *
   * @param  Array $attributes The attributes of the shortcode
   * @return string            HTML
   */
  function log_lolla_create_custom_shortcode_topics( $attributes ) {
    // Default attributes
    $default_attributes = array(
      'categories' => 5,
      'tags' => 5
    );

    // Parse attributes
    $attrs = shortcode_atts( $default_attributes, $attributes );

    // Content
    $content = log_lolla_display_topics_with_sparklines(
      10,
      $attr['categories'],
      $attrs['tags']
    );

    return log_lolla_display_shortcode( esc_html__( 'Topics', 'log-lolla' ), $content );
  }

  add_shortcode( 'log-lolla-topics', 'log_lolla_create_custom_shortcode_topics' );
}





if ( ! function_exists( 'log_lolla_create_custom_shortcode_topics_summary' ) ) {
  /**
   * Display topics summary
   *
   * Usage: [log-lolla-topics-summary categories="5" tags="3"]
   *
   * Displays a text / paragraph containing all the category and tag descriptions merged together
   *
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

    // Content
    $content = log_lolla_display_topics_summary( $attrs['categories'], $attrs['tags'] );

    return log_lolla_display_shortcode( '', $content );
  }

  add_shortcode( 'log-lolla-topics-summary', 'log_lolla_create_custom_shortcode_topics_summary' );
}



if ( ! function_exists( 'log_lolla_create_custom_shortcode_archives' ) ) {
  /**
   * Display archives of years and month
   *
   * Usage: [log-lolla-archives]
   *
   * @param  Array $attributes The attributes of the shortcode
   * @return string            HTML
   */
  function log_lolla_create_custom_shortcode_archives( $attributes ) {
    // Default attributes
    $default_attributes = array(
    );

    // Parse attributes
    $attrs = shortcode_atts( $default_attributes, $attributes );

    // Get content
    $content = log_lolla_display_archives_by_year_and_month();

    return log_lolla_display_shortcode( esc_html__( 'Archives', 'log-lolla' ), $content );
  }

  add_shortcode( 'log-lolla-archives', 'log_lolla_create_custom_shortcode_archives' );
}



/**
 * Shortcode helpers
 */


if ( ! function_exists( 'log_lolla_display_shortcode' ) ) {
  /**
   * Display a shortcode
   *
   * If has `title` it will be displayed in an `aside`
   *
   * @param  string $title   The shortcode title
   * @param  string $content The shortcode content
   * @return string          HTML
   */
  function log_lolla_display_shortcode( $title, $content ) {
    $html = '';

    if ( ! empty( $title ) ) {
      $html .= log_lolla_display_shortcode_header( $title );
      $html .= '<div class="shortcode-body">';
    }

    if ( ! empty( $content ) ) {
      $html .= $content;
    }

    if ( ! empty( $title ) ) {
      $html .= '</div>';
      $html .= "</aside>";
    }

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_display_shortcode_header' ) ) {
  /**
   * Display shortcode header
   *
   * It wraps the content of a shortcode into an `aside`
   *
   * @param  string $title The shortcode title
   * @return string        HTML
   */
  function log_lolla_display_shortcode_header( $title ) {
    $html .= '<aside class="shortcode shortcode-' . log_lolla_convert_string_to_classname( $title ) . '">';
    $html .= '<h3 class="shortcode-title">';
    $html .= __( $title, 'log_lolla' );
    $html .= '</h3>';

    return $html;
  }
}


?>
