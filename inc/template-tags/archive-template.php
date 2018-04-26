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


if ( ! function_exists(' log_lolla_display_archives_by_year_and_month' ) ) {
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
    foreach ($dates as $year => $months) {
      $html .= '<div class="year-and-months">';
      $html .= '<div class="year"><a class="link" href="' . get_year_link( $year ) .'" title="' . $year .'">' . $year . '</a></div>';

      $grid = round( count($months) / 2 );
      $html .= '<div class="months grid-' . $grid . '">';

      foreach ($months as $month) {
        $html .= '<div class="month"><a class="link" href="' . get_month_link( $year, $month ) .'" title="' . $month .'">' . $month . '</a></div>';
      }

      $html .= '</div>';
      $html .= '</div>';
    }

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
