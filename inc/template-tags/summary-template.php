<?php
  /**
   * Summaries template tags for this theme
   *
   * Contains custom template tags related to categories and tags
   *
   * @link https://codex.wordpress.org/Template_Tags
   *
   * @package Log_Lolla
   */


if ( ! function_exists( 'log_lolla_display_summary_dates' ) ) {
  /**
   * Display the dates for a summary
   *
   * @param  Object $summary The summary
   * @return string          HTML
   */
  function log_lolla_display_summary_dates( $summary ) {
    if ( empty( $summary ) ) return;

    $dates = log_lolla_get_summary_dates( $summary );
    if ( empty( $dates ) ) return;

    printf(
     '<time class="date published" datetime="%1$s">%2$s</time>',
     esc_attr( $dates[0] ),
     esc_html( $dates[0] )
   );

   if ( ! empty( $dates[1] ) ) {
     printf(
      '<span class="dates-separator">%1$s</span><time class="date published" datetime="%2$s">%3$s</time>',
      esc_html( '&nbsp;&mdash;&nbsp;', 'log-lolla' ),
      esc_attr( $dates[1] ),
      esc_html( $dates[1] )
    );
   }
  }
}


if ( ! function_exists( 'log_lolla_get_summary_dates' ) ) {
  /**
   * Get the dates for a summary
   *
   * @param  Object $summary The summary
   * @return Array           The dates
   */
  function log_lolla_get_summary_dates( $summary ) {
    if ( empty( $summary ) ) return;

    $dates = [];

    $dates[] = get_the_date( 'F j, Y', $summary );
    $dates[] = log_lolla_get_summary_last_date( $summary );

    return $dates;
  }
}



if ( ! function_exists( 'log_lolla_get_summary_last_date' ) ) {
  function log_lolla_get_summary_last_date( $summary ) {
    if ( empty( $summary ) ) return;

    $topic = log_lolla_get_summary_topic( $summary );
    if ( empty( $topic ) ) return;

    $summaries_for_topic = log_lolla_get_summaries_for_archive( $topic );
    if ( empty( $summaries_for_topic ) ) return;

    if ( count( $summaries_for_topic ) < 2 ) return;

    return get_the_date( 'F j, Y', $summaries_for_topic[1] );
  }
}


if ( ! function_exists( 'log_lolla_display_summary_link_to_topic' ) ) {
  /**
   * Display a link to a topic for a summary
   *
   * @param  Object $summary The summary
   * @return string          HTML
   */
  function log_lolla_display_summary_link_to_topic( $summary ) {
    if ( empty( $summary ) ) return;

    $topic = log_lolla_get_summary_topic( $summary );
    if ( empty( $topic ) ) return;

    set_query_var( 'term', $topic );

    ob_start();
    get_template_part( 'template-parts/topic/topic' );
    $term = ob_get_clean();

    return sprintf(
      '<span class="on">%1$s</span><span class="topic">%2$s</span>',
      esc_html( 'On&nbsp;', 'log-lolla'),
      $term
    );
  }
}


if ( ! function_exists( 'log_lolla_get_summary_topic' ) ) {
  /**
   * Get the topic of a summary
   *
   *
   * @param  Object $summary The summary
   * @return Object          The topic
   */
  function log_lolla_get_summary_topic( $summary ) {
    if ( empty( $summary ) ) return;

    $categories = get_the_category( $summary->ID );
    if ( empty( $categories[0] ) ) return;

    return $categories[0];
  }
}



if ( ! function_exists( 'log_lolla_display_summaries' ) ) {
  function log_lolla_display_summaries( $number_of_summaries ) {
    $summaries = get_posts(
      array(
        'post_type' => 'summary',
        'post_status' => 'publish',
        'posts_per_page' => $number_of_summaries,
        'order' => 'ASC'
      )
    );

    if ( empty( $summaries ) ) return;

    $html = '';

    global $post;
    ob_start();
    foreach ( $summaries as $post ) {
      setup_postdata( $post );
      get_template_part( 'template-parts/summary/summary' );
    }
    wp_reset_postdata();
    $html .= ob_get_clean();

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_display_summaries_for_archive' ) ) {
  /**
   * Display summaries for an archive
   *
   * @param  Object $archive The archive
   * @return string          HTML
   */
  function log_lolla_display_summaries_for_archive( $archive ) {
    if ( empty( $archive ) ) return;

    $summaries = log_lolla_get_summaries_for_archive( $archive );
    if ( empty( $summaries ) ) return;

    global $SUMMARIES_COUNT;
    $SUMMARIES_COUNT = count( $summaries );

    $html = '';

    global $post;
    ob_start();
    foreach ( $summaries as $post ) {
      setup_postdata( $post );
      get_template_part( 'template-parts/post/post', 'search' );
    }
    wp_reset_postdata();
    $html .= ob_get_clean();

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_get_summaries_for_archive' ) ) {
  /**
   * Get summaries for an archive
   *
   * @param  Object $archive The archive
   * @return Array          The list of posts
   */
  function log_lolla_get_summaries_for_archive( $archive ) {
    if ( empty( $archive ) ) return;

    $posts = get_posts(
      array(
        'post_type' => 'summary',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'tax_query' => array(
          array(
            'taxonomy' => $archive->taxonomy,
            'field' => 'slug',
            'terms' => $archive->slug
          )
        )
      )
    );

    return $posts;
  }
}


?>
