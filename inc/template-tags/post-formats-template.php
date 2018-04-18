<?php
  /**
   * Post formats template tags for this theme
   *
   * Contains custom template tags related to post formats
   *
   * @link https://codex.wordpress.org/Template_Tags
   *
   * @package Log_Lolla
   */
?>

<?php

if ( ! function_exists( 'log_lolla_display_post_formats_with_post_count' ) ) {
  /**
   * Display post formats with post count
   *
   * @return string HTML
   */
  function log_lolla_display_post_formats_with_post_count() {
    $post_formats = log_lolla_get_post_formats_with_post_count();
    if ( empty( $post_formats)) return;

    $html = '';
    $html .= log_lolla_display_widget_body( 'post-formats', 'post-format', $post_formats, function( $item ) {
      return log_lolla_display_post_format_with_post_count( $item );
    });

    return $html;
  }
}



if ( ! function_exists( 'log_lolla_display_post_format_with_post_count' ) ) {
  /**
   * Display post format with post count
   *
   * @param  object $item The post format object with count
   * @return string       HTML
   */
  function log_lolla_display_post_format_with_post_count( $item ) {
    if ( empty( $item) ) return;

    $html = '';
    $html .= '<span class="post-format-name">' . log_lolla_display_post_format_archive_link( $item->post_format_name ) . '</span>';
    $html .= '<span class="post-count">' . $item->post_count . '</span>';

    return $html;
  }
}

if ( ! function_exists( 'log_lolla_display_post_format_archive_link' ) ) {
  /**
   * Display a link to a post format archive
   *
   * Standard post formats have no archive link
   *
   * @param  string $post_format_name The name of a post format
   * @return string                   HTML
   */
  function log_lolla_display_post_format_archive_link( $post_format_name ) {
    $html = '<a class="link" title="' . $post_format_name .'" href="' . get_post_format_link( $post_format_name ) . '">';
    $html .= $post_format_name;
    $html .= '</a>';

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_get_post_formats_with_post_count' ) ) {
  /**
   * Get post formats with post count
   *
   * @return Array An array of objects with post format and post count
   */
  function log_lolla_get_post_formats_with_post_count() {
    $post_formats_list = get_post_format_strings();
    if ( empty( $post_formats_list) ) return;

    $post_formats_with_count = [];

    foreach ($post_formats_list as $post_format) {
      $posts = get_posts(
        array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'numberposts' => -1,
          'tax_query' => array(
            array(
              'taxonomy' => 'post_format',
              'field' => 'slug',
              'terms' => array(
                // It seems WP has two entries for a single post format: 'post-format-quote' and 'quote'
                // - https://imgur.com/a/RoysD
                // - this is an error / bug because if we have a Quote tag then it will be taken as a post format
                // - however this query is working fine, the count was manually verified
                'post-format-' . strtolower( $post_format ),
                strtolower( $post_format )
              )
            )
          )
        )
      );

      $obj = new stdClass();
      $obj->post_format_name = $post_format;
      $obj->post_count = count( $posts );

      $post_formats_with_count[] = $obj;
    }

    return log_lolla_get_post_formats_with_post_count_for_standard_posts( $post_formats_with_count );
  }
}


if ( ! function_exists( 'log_lolla_get_post_formats_with_post_count_for_standard_posts' ) ) {
  /**
   * Fix post format Standard post count
   *
   * There is no such term / taxonomy as `post-format-standard` like `post-format-quote`
   * Therefore the post count for Standard posts is always 0
   * Here we calculate manually Standard post counts by substracting all other post format counts from the count of total posts
   *
   * @param  Array $post_formats_with_count An array of objects
   * @return Array                          An array of objects
   */
  function log_lolla_get_post_formats_with_post_count_for_standard_posts( $post_formats_with_count ) {
    $total_number_of_posts = wp_count_posts()->publish;

    $total_number_of_posts_with_post_format = 0;
    foreach ( $post_formats_with_count as $post_format ) {
      $total_number_of_posts_with_post_format += $post_format->post_count;
    }

    foreach ( $post_formats_with_count as $post_format ) {
      if ( $post_format->post_format_name == 'Standard' ) {
        $post_format->post_count = $total_number_of_posts - $total_number_of_posts_with_post_format;
      }
    }

    return $post_formats_with_count;
  }
}


?>
