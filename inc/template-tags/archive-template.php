<?php
  /**
   * Archive template tags for this theme
   *
   * Contains custom template tags related to archives by date and time
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

   $posts_of_a_source = log_lolla_get_posts_of_a_post_type( $post );

   $ret = [];

   $ret[] = empty( $posts_of_a_source ) ? 0 : count( $posts_of_a_source );
   $ret[] = is_null( $SUMMARIES_COUNT ) ? 0 : $SUMMARIES_COUNT;
   $ret[] = is_null( $STANDARD_POSTS_COUNT ) ? 0 : $STANDARD_POSTS_COUNT;
   $ret[] = is_null( $RELATED_TOPICS_COUNT ) ? 0 : $RELATED_TOPICS_COUNT;

   return $ret;
 }
}




if ( ! function_exists( 'log_lolla_get_first_post_and_last_post_date' ) ) {
  /**
   * Get first post and last post published dates
   *
   * Returns smnthg like Array ( [0] => 2018-03-27 06:21:26 [1] => 2017-12-05 14:27:58 )
   *
   * @return array Of two dates
   */
  function log_lolla_get_first_post_and_last_post_date() {
    $posts = get_posts(
      array(
        'posts_per_page' => -1,
      )
    );
    if ( empty( $posts ) ) return;

    $first = reset( $posts );
    $last = end( $posts );
    if ( ( $first == false ) || ($last == false ) ) return;

    $ret = [];
    $ret[] = $last->post_date;
    $ret[] = $first->post_date;

    return $ret;
  }
}


if ( ! function_exists( 'log_lolla_display_archives_by_year_and_month' ) ) {
  /**
   * Display archives by year and month
   *
   * @return string HTML
   */
  function log_lolla_display_archives_by_year_and_month() {
    $archives = log_lolla_get_archives_by_year_and_month();

    $dates = log_lolla_group_archives_by_year_and_month($archives);
    if ( empty( $dates ) ) return;

    $html = '';

    ob_start();
    foreach ($dates as $archive_year => $archive_months) {
      set_query_var( 'archive_year', $archive_year );
      set_query_var( 'archive_months', $archive_months );

      get_template_part( 'template-parts/archive/archive', 'year-and-months' );
    }

    $html .= ob_get_clean();

    return $html;
  }
}


if ( ! function_exists(' log_lolla_group_archives_by_year_and_month' ) ) {
  /**
   * Groups archives into an array of years and months
   *
   * Return something like:
   *  Array ( [2017] => Array ( [0] => 12 ) [2018] => Array ( [0] => 01 [1] => 02 [2] => 03 ) )
   *
   * @param  array $archives An array of objects
   * @return array           An array of arrays
   */
  function log_lolla_group_archives_by_year_and_month($archives) {
    if ( empty( $archives ) ) return;

    // Get an array with timestamps like 2017-12-05 14:27:58
    $timestamps = array_map( function($d) { return $d->post_date; }, $archives );
    if ( empty( $timestamps ) ) return;

    // Get an array with dates like 2017-12, 2018-01, ...
    $dates = array_reverse( array_unique( array_map( function($d) { return date( 'Y-m', strtotime( $d ) ); }, $timestamps ) ) );
    if ( empty( $dates ) ) return;

    // Create a multidimensional array like [2017] => [12], [2018] => [01, 02, 03]
    $ret = [];
    foreach ($dates as $d) {
      $split = explode( '-', $d );
      $ret[$split[0]][] = $split[1];
    }

    return $ret;
  }
}


if ( ! function_exists( 'log_lolla_get_archives_by_year_and_month' ) ) {
  /**
   * Get all years and months when there were posts published
   *
   * Returns an array of objects like:
   *  Array ( [0] => stdClass Object ( [post_date] => 2017-12-05 14:27:58 [post_status] => publish ) [1] => stdClass Object ( [post_date] => 2017-12-06 07:13:21 [post_status] => publish ) ...
   *
   * @return array
   */
  function log_lolla_get_archives_by_year_and_month() {
    global $wpdb;

    $results = $wpdb->get_results(
      "SELECT `post_date`, `post_status` FROM $wpdb->posts WHERE `post_status` = 'publish' GROUP BY `post_date`",
      OBJECT
    );

    return $results;
  }
}



?>
