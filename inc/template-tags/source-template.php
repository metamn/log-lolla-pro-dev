<?php
  /**
   * Source template tags for this theme
   *
   * Contains custom template tags related to the source post type
   *
   * @link https://codex.wordpress.org/Template_Tags
   *
   * @package Log_Lolla
   */


if ( ! function_exists( 'log_lolla_get_source_counters' ) ) {
  /**
   * Get the counters of a source
   *
   * Counters are posts count, summaries count etc.
   *
   * @param  object $post The source object
   * @return Array        An array of integers
   */
  function log_lolla_get_source_counters( $post ) {
    global $SUMMARIES_COUNT;
    global $STANDARD_POSTS_COUNT;
    global $RELATED_TOPICS_COUNT;

    $posts_of_a_source = log_lolla_get_posts_of_a_source( $post );

    $ret = [];

    $ret[] = empty( $posts_of_a_source ) ? 0 : count( $posts_of_a_source );
    $ret[] = is_null( $SUMMARIES_COUNT ) ? 0 : $SUMMARIES_COUNT;
    $ret[] = is_null( $STANDARD_POSTS_COUNT ) ? 0 : $STANDARD_POSTS_COUNT;
    $ret[] = is_null( $RELATED_TOPICS_COUNT ) ? 0 : $RELATED_TOPICS_COUNT;

    return $ret;
  }
}


if ( ! function_exists( 'log_lolla_display_sources_with_post_count' ) ) {
  /**
   * Display Sources post type with post count
   *
   * Compiling all links added to post content and adding them as Sources is
   * - very time consuming
   * - highly innacurate (cannot really scrape well website titles. some of them contain also the site's short description)
   * - there are too many links / Sources many of them is not relevant
   *
   * At this moment Sources will be populated manually like People
   *
   * @param  integer $number_of_sources How many sources to display
   * @return string                     HTML
   */
  function log_lolla_display_sources_with_post_count( $number_of_sources = 5 ) {
    $sources = log_lolla_get_most_popular_sources( $number_of_sources );
    if ( empty( $sources ) ) return;

    $html = '';
    $html .= log_lolla_display_widget_body( 'sources', 'source-with-count', $sources, function( $item ) {
      return log_lolla_display_source_with_post_count( $item );
    });

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_display_source_with_post_count') )  {
  /**
   * Display source and post count
   *
   * @param  Object $item Contains the source id and the count of the source's posts
   * @return string       HTML
   */
  function log_lolla_display_source_with_post_count( $item ) {
    if ( empty( $item ) ) return;

    $source = get_post( $item->source );
    $count = $item->post_count;

    return log_lolla_display_source( $source, $count );
  }
}


if ( ! function_exists( 'log_lolla_display_source' ) ) {
  /**
   * Display a source
   *
   * @param  Object   $source     The source object
   * @param  integer  $post_count The post count for the source
   * @return string               HTML
   */
  function log_lolla_display_source( $source, $post_count ) {
    if ( empty( $source ) ) return;

    $name = $source->post_title;
    $link = get_permalink( $source );

    if ( has_post_thumbnail( $source->ID ) ) {
      $image = get_the_post_thumbnail( $source->ID, 'thumbnail' );
    } else {
      $image = '<img src="' . get_stylesheet_directory_uri() . '/assets/images/brutalist_line_SVGicon_author2-64x64.png" title="' . $name . '">';
    }

    // Return HTML
    $html = '';

    ob_start();

    set_query_var( 'source_link', $link );
    set_query_var( 'source_name', $name );
    set_query_var( 'source_image', $image );
    set_query_var( 'source_post_count', $post_count );
    get_template_part( 'template-parts/source/source', 'thumb-name-and-count' );

    $html .= ob_get_clean();

    return $html;
  }
}



if ( ! function_exists( 'log_lolla_get_most_popular_sources' ) ) {
  /**
   * Get most popular sources
   *
   * @param  integer $number_of_posts How many posts to return
   * @return Array                    An array of posts
   */
  function log_lolla_get_most_popular_sources( $number_of_posts = 5 ) {
    $sources = get_posts(
      array(
        'post_type' => 'source',
        'post_status' => 'publish',
        'posts_per_page' => -1,
      )
    );
    if ( empty( $sources ) ) return;

    // Get posts of sources
    //
    $posts_of_sources = [];
    foreach ( $sources as $source ) {
      $posts_of_a_source = log_lolla_get_posts_of_a_source( $source );

      $entry = new stdClass;
      $entry->source = $source->ID;
      $entry->post_count = count( $posts_of_a_source );
      $posts_of_sources[] = $entry;
    }

    // Sorst posts of sources
    //
    usort( $posts_of_sources, function( $a, $b ) {
      return ( $a->post_count < $b->post_count );
    });

    // Return the first x items only
    //
    return array_slice( $posts_of_sources, 0, $number_of_posts );
  }
}


if ( ! function_exists( 'log_lolla_get_posts_of_a_source' ) ) {
  /**
   * Get posts of a source
   *
   * @param  Object $source A post of type 'sources'
   * @return Array          A list of posts
   */
  function log_lolla_get_posts_of_a_source( $source ) {
    if ( empty( $source ) ) return;

    return get_posts(
      array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => -1,
        'tax_query' => array(
          array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => $source->post_name
          )
        )
      )
    );
  }
}

?>
