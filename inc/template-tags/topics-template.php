<?php
  /**
   * Topics template tags for this theme
   *
   * Contains custom template tags related to categories and tags
   *
   * @link https://codex.wordpress.org/Template_Tags
   *
   * @package Log_Lolla
   */


if ( ! function_exists( 'log_lolla_display_topics_summary' ) ) {
  /**
   * Display topics summary
   *
   * Displays a text / paragraph containing all the category and tag descriptions merged together
   *
   * The $number_of_categories and $number_of_tags works like:
   * - negative: display all ??? bust mostly a random number
   * - 0: display none
   *
   * @link https://developer.wordpress.org/reference/classes/wp_term_query/__construct/
   *
   * @param  integer $number_of_categories How many categories to show
   * @param  integer $number_of_tags       How many tags to show
   * @return string                        HTML
   */
  function log_lolla_display_topics_summary( $number_of_categories = 5, $number_of_tags = 5 ) {
    if ( $number_of_categories == 0) {
      $categories = [];
    } else {
      $categories = log_lolla_get_most_popular_terms_by_count( 'category', $number_of_categories );
    }

    if ( $number_of_tags == 0) {
      $tags = [];
    } else {
      $tags = log_lolla_get_most_popular_terms_by_count( 'post_tag', $number_of_tags );
    }

    if ( empty( $categories ) && empty( $tags ) ) return;

    $categories_descriptions = array_filter(
      array_map(
        function( $term ) {
          return strtolower( log_lolla_get_term_description( $term->term_id, 'category' ) );
        },
        $categories
      )
    );

    $tags_descriptions = array_filter(
      array_map(
        function( $term ) {
          return strtolower( log_lolla_get_term_description( $term->term_id, 'post_tag' ) );
        },
        $tags
      )
    );

    if ( empty( $categories_descriptions ) && empty( $tags_descriptions ) ) return;


    $html = '<aside class="shortcode shortcode-topics-summary">';
    $html .= '<h3 hidden>' . esc_html_x( 'Shortcode Topics Summary', 'log-lolla-pro' ) . '</h3>';
    $html .= '<div class="text">';

    $html .= esc_html_x( 'This site is about', 'log-lolla-pro' );
    $separator = esc_html_x( ', ', 'log-lolla-pro' );
    $html .= ' ';

    if ( ! empty( $categories_descriptions ) ) {
      if ( ! empty( $tags_descriptions) ) {
        $html .= implode( $separator, $categories_descriptions );
      } else {
        $html .= log_lolla_implode_with_conjunction( $categories_descriptions,  $separator, 'and' );
      }

    }

    if ( ! empty( $tags_descriptions ) ) {
      if ( ! empty( $categories_descriptions ) ) {
        $html .= ', ';

        if ( count($tags_descriptions) == 1 ) {
          $html .= 'and ';
        }
      }

      $html .= log_lolla_implode_with_conjunction( $tags_descriptions,  $separator, 'and' );
    }

    $html .= '.</div></aside>';

    return $html;
  }
}



if ( ! function_exists( 'log_lolla_display_topics_with_count' ) ) {
   /**
    * Display topics (categories and tags) and their count of posts
    *
    * @param  integer $number_of_categories How many categories to show
    * @param  integer $number_of_tags       How many tags to show
    * @return string                        HTML
    */
   function log_lolla_display_topics_with_count($number_of_categories = 5, $number_of_tags = 5) {
     $categories = log_lolla_get_most_popular_terms_by_count( 'category', $number_of_categories );
     $tags = log_lolla_get_most_popular_terms_by_count( 'post_tag', $number_of_tags );
     if ( empty( $categories ) && empty( $tags ) ) return;

     $html = '';

     $html .= log_lolla_display_widget_body( 'categories', 'category', $categories, function( $item ) {
       return log_lolla_display_topic_with_count( 'category', $item );
     });

     $html .= log_lolla_display_widget_body( 'tags', 'tag', $tags, function( $item ) {
       return log_lolla_display_topic_with_count( 'tag', $item );
     });

     return $html;
   }
 }


 if ( ! function_exists( 'log_lolla_display_topic_with_count' ) ) {
   /**
    * Display a topic with a count
    *
    * @param  string $item_class_name      The item class name
    * @param  Object $item                 The item
    * @return string                       HTML
    */
   function log_lolla_display_topic_with_count($item_class_name, $item) {
     if ( empty( $item ) ) return;

     $html = '<span class="' . $item_class_name . '-name">';
     $html .= '<a class="link" href="' . get_term_link( $item ) . '" title="' . $item->name . '">' . $item->name . '</a>';
     $html .= '</span>';
     $html .= '<span class="' . $item_class_name . '-count">' . $item->count . '</span>';

     return $html;
   }
 }


 if ( ! function_exists( 'log_lolla_display_topics_with_sparklines' ) ) {
   /**
    * Display topics (categories and tags) using sparklines
    *
    * @param  integer $sparklines           Number of sparklines. See @link https://github.com/aftertheflood/sparks
    * @param  integer $number_of_categories How many categories to show
    * @param  integer $number_of_tags       How many tags to show
    * @return string                        HTML
    */
   function log_lolla_display_topics_with_sparklines( $sparklines = 10, $number_of_categories = 5, $number_of_tags = 5) {
     // Get an array of dates for each sparkline
     $sparkline_dates = log_lolla_get_sparkline_dates( $sparklines );
     if ( empty( $sparkline_dates ) ) return;

     // Get most popular topics
     $categories = log_lolla_get_most_popular_terms_by_count( 'category', $number_of_categories );
     $tags = log_lolla_get_most_popular_terms_by_count( 'post_tag', $number_of_tags );
     if ( empty( $categories ) && empty( $tags ) ) return;

     $html = '';

     $html .= log_lolla_display_widget_body( 'categories', 'category', $categories, function( $item ) use( $sparkline_dates ) {
       return log_lolla_display_topic_with_sparklines( 'category', $item, $sparkline_dates );
     });

     $html .= log_lolla_display_widget_body( 'tags', 'tag', $tags, function( $item ) use( $sparkline_dates ) {
       return log_lolla_display_topic_with_sparklines( 'tag', $item, $sparkline_dates );
     });

     return $html;
   }
 }


 if ( ! function_exists( 'log_lolla_display_topic_with_sparklines' ) ) {
   /**
    * Display a topic (category or tag) with sparklines
    *
    * @param  string  $item_class_name              The item class name
    * @param  Object  $item                         The item
    * @param  Object  $sparkline_dates              The sparkline dates array
    * @return string                                HTML
    */
   function log_lolla_display_topic_with_sparklines( $item_class_name, $item, $sparkline_dates ) {
     if ( empty( $item ) ) return;
     if ( empty( $sparkline_dates ) ) return;

     $html = '<span class="' . $item_class_name . '-name">';
     $html .= '<a class="link" href="' . get_term_link( $item ) . '" title="' . $item->name . '">' . $item->name . '</a>';
     $html .= '</span>';
     $html .= '<span class="' . $item_class_name . '-sparklines sparks-font sparks-font-dotline-medium">';
     $html .= log_lolla_display_sparklines_for_topic( $sparkline_dates, $item );
     $html .= '</span>';

     return $html;
   }
 }


 if ( ! function_exists( 'log_lolla_display_sparklines_for_topic' ) ) {
   /**
    * Display sparklines for a topic
    *
    * @param  Array $sparkline_dates              The array of dates for each sparkline
    * @param  Object  $item                       A term
    * @return string                              HTML
    */
   function log_lolla_display_sparklines_for_topic( $sparkline_dates, $item ) {
     $sparklines = log_lolla_get_sparklines_for_topic( $sparkline_dates, $item );
     if ( empty( $sparklines ) ) return;

     $sparklines = log_lolla_adjust_range_for_sparkline( $sparklines );

     return '{' . implode( ',', $sparklines ) . '}';
   }
 }


 if (! function_exists( 'log_lolla_get_sparklines_for_topic' ) ) {
   /**
    * Get the sparklines for a topic (category, tag)
    *
    * @param  Array $sparkline_dates              The array of dates for each sparkline
    * @param  Object  $item                       A term
    * @return Array                               An array of integers
    */
   function log_lolla_get_sparklines_for_topic( $sparkline_dates, $item ) {
     if ( empty( $item ) ) return;
     if ( empty( $sparkline_dates ) ) return;

     $sparklines = [];

     for ( $i = 0; $i < count($sparkline_dates) - 1; $i++ ) {
       $posts = get_posts(
         array(
           'post_type' => 'post',
           'post_status' => 'publish',
           'posts_per_page' => -1,
           'order' => 'ASC',
           'tax_query' => array(
             array(
               'taxonomy' => $item->taxonomy,
               'field' => 'slug',
               'terms' => $item->slug
             )
           ),
           'date_query' => array(
             array(
               'after' => date('Y-m-d', strtotime( $sparkline_dates[$i] )),
               'before' => date('Y-m-d', strtotime( $sparkline_dates[$i + 1] ))
             )
           )
         )
       );

       $sparklines[] = count( $posts );
     }

     return $sparklines;
   }
 }

 if ( ! function_exists( 'log_lolla_get_sparkline_dates' ) ) {
   /**
    * Get the dates corresponding to a set of sparkline
    *
    * @param  integer $sparklines Total number of sparkines
    * @return array               An array of dates
    */
   function log_lolla_get_sparkline_dates( $sparklines ) {
     // Get the first post and the last post dates
     $post_dates = log_lolla_get_first_post_and_last_post_date();
     if ( empty( $post_dates ) ) return;

     // Number of days since the first post (ie. 110)
     $date1 = new DateTime( $post_dates[0] );
     $date2 = new DateTime( $post_dates[1] );
     $number_of_days = $date2->diff( $date1 )->format( "%a" );

     // Number of days for a sparkline unit (ie 11, from 110 / $sparklines)
     $number_of_days_per_sparkline = round( $number_of_days / $sparklines );

     $dates = [];

     $date = $date1;
     while ($date <= $date2) {
       // If we don't convert $date to string then always the same date will be added to the $dates array ...
       $dates[] = $date->format('Y-m-d');
       $date = $date->modify( '+' . $number_of_days_per_sparkline . ' days' );
     }

     return $dates;
   }
 }


 if ( ! function_exists( 'log_lolla_get_most_popular_terms_by_count' ) ) {
   /**
    * Get most popular terms by the count of posts they belong to
    *
    * @link https://developer.wordpress.org/reference/classes/wp_term_query/__construct/
    *
    * Returns something like:
    *  Array ( [0] => WP_Term Object ( [term_id] => 2 [name] => Emerging [slug] => emerging [term_group] => 0 [term_taxonomy_id] => 2 [taxonomy] => category [description] => [parent] => 0 [count] => 41 [filter] => raw ) [1] => WP_Term Object ( [term_id] => 7 [name] => Wordpress Themes [slug] => wordpress-themes
    *
    * @param  string  $taxonomy The taxonomy id like 'category', 'post_tag'
    * @param  integer $how_many How many terms to get. Accepts 0 (all) or any positive number. Default 0 (all)
    * @return array             An array of term objects
    */
   function log_lolla_get_most_popular_terms_by_count( $taxonomy, $how_many ) {
     return get_terms(
       array(
         'taxonomy' => $taxonomy,
         'hide_empty' => true,
         'orderby' => 'count',
         'order' => 'DESC',
         'number' => $how_many
       )
     );
   }
 }



?>
