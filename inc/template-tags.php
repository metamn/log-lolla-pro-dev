<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Log_Lolla
 */



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

    $html = '';
    $html .= log_lolla_display_source( $source );
    $html .= '<span class="post-count">' . $count . '</span>';

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


if ( ! function_exists( 'log_lolla_display_source' ) ) {
  /**
   * Display a source from the database
   *
   * @param  Object $source The source object
   * @return string         HTML
   */
  function log_lolla_display_source( $source ) {
    if ( empty( $source ) ) return;

    $name = $source->post_title;
    $link = get_permalink( $source );

    if ( has_post_thumbnail( $source->ID ) ) {
      $image = get_the_post_thumbnail( $source->ID, 'thumbnail' );
    } else {
      $image = '<img src="' . get_stylesheet_directory_uri() . '/assets/images/brutalist_line_SVGicon_author2-64x64.png" title="' . $name . '">';
    }

    // Return HTML
    ob_start();
    ?>

    <aside class="source">
      <h3 class="source__name">
        <a class="link" href="<?php echo $link ?>" title="<?php echo $name ?>"><?php echo $name ?></a>
      </h3>

      <figure class="source__icon figure">
        <a class="link" href="<?php echo $link ?>" title="<?php echo $name ?>">
          <?php echo $image ?>
        </a>
      </figure>
    </aside>

    <?php
    return ob_get_clean();
  }
}





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




if ( ! function_exists( 'log_lolla_display_people_with_post_count' ) ) {
  /**
   * Display People with post count
   *
   * @param  integer $number_of_people How many people to display
   * @return string                    HTML
   */
  function log_lolla_display_people_with_post_count( $number_of_people = 5 ) {
    $people = log_lolla_get_most_popular_people( $number_of_people );
    if ( empty( $people ) ) return;

    $html = '';
    $html .= log_lolla_display_widget_body( 'people', 'person-with-count', $people, function( $item ) {
      return log_lolla_display_person_with_post_count( $item );
    });

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_display_person_with_post_count') )  {
  /**
   * Display person and post count
   *
   * @param  Object $item Contains the person id and the count of the person's posts
   * @return string       HTML
   */
  function log_lolla_display_person_with_post_count( $item ) {
    if ( empty( $item ) ) return;

    $person = get_post( $item->person );
    $count = $item->post_count;

    $html = '';
    $html .= log_lolla_display_person( $person );
    $html .= '<span class="post-count">' . $count . '</span>';

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_get_most_popular_people' ) ) {
  /**
   * Get most popular people
   *
   * @param  integer $number_of_posts How many posts to return
   * @return Array                    An array of posts
   */
  function log_lolla_get_most_popular_people( $number_of_posts = 5 ) {
    $people = get_posts(
      array(
        'post_type' => 'people',
        'post_status' => 'publish',
        'posts_per_page' => -1,
      )
    );
    if ( empty( $people ) ) return;

    // Get posts of people
    //
    $posts_of_people = [];
    foreach ( $people as $person ) {
      $posts_of_a_person = log_lolla_get_posts_of_a_person( $person );

      $entry = new stdClass;
      $entry->person = $person->ID;
      $entry->post_count = count($posts_of_a_person);
      $posts_of_people[] = $entry;
    }

    // Sorst posts of people
    //
    usort( $posts_of_people, function( $a, $b ) {
      return ( $a->post_count < $b->post_count );
    });

    // Return the first x items only
    //
    return array_slice( $posts_of_people, 0, $number_of_posts );
  }
}


if ( ! function_exists( 'log_lolla_get_posts_of_a_person' ) ) {
  /**
   * Get posts of a person
   *
   * @param  Object $person A post of type 'person'
   * @return Array          A list of posts
   */
  function log_lolla_get_posts_of_a_person( $person ) {
    if ( empty( $person ) ) return;

    return get_posts(
      array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => -1,
        'tax_query' => array(
          array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => $person->post_name
          )
        )
      )
    );
  }
}


if ( ! function_exists( 'log_lolla_display_person' ) ) {
  /**
   * Display a person
   *
   * Based on either a database entry or from a simple name
   *
   * @param  Object $person The person object
   * @param  string $name   The person name
   * @return string         HTML
   */
  function log_lolla_display_person( $person, $name = '' ) {
    if ( empty( $person ) && empty( $name )) return;

    return empty( $person ) ? log_lolla_display_person_from_name( $name ) : log_lolla_display_person_from_database( $person );
  }
}


if ( ! function_exists( 'log_lolla_display_person_from_name' ) ) {
  /**
   * Display person from name only
   *
   * Used when there is no `person` entry in the database
   *
   * @param  string $name   The person name
   * @return string         HTML
   */
  function log_lolla_display_person_from_name( $name ) {
    if ( empty( $name ) ) return;

    $image = '<img src="' . get_stylesheet_directory_uri() . '/assets/images/brutalist_line_SVGicon_author2-64x64.png" title="' . $name . '">';

    // Return HTML
    ob_start();
    ?>

    <aside class="person">
      <h3 class="person__name"><?php echo $name ?></h3>

      <figure class="person__avatar figure">
        <?php echo $image ?>
      </figure>
    </aside>

    <?php
    return ob_get_clean();
  }
}


if ( ! function_exists( 'log_lolla_display_person_from_database' ) ) {
  /**
   * Display a person from the database
   *
   * @param  Object $person The person object
   * @return string         HTML
   */
  function log_lolla_display_person_from_database( $person ) {
    if ( empty( $person ) ) return;

    $name = $person->post_title;
    $link = get_permalink( $person );

    if ( has_post_thumbnail( $person->ID ) ) {
      $image = get_the_post_thumbnail( $person->ID, 'thumbnail' );
    } else {
      $image = '<img src="' . get_stylesheet_directory_uri() . '/assets/images/brutalist_line_SVGicon_author2-64x64.png" title="' . $name . '">';
    }

    // Return HTML
    ob_start();
    ?>

    <aside class="person">
      <h3 class="person__name">
        <a class="link" href="<?php echo $link ?>" title="<?php echo $name ?>"><?php echo $name ?></a>
      </h3>

      <figure class="person__avatar figure">
        <a class="link" href="<?php echo $link ?>" title="<?php echo $name ?>">
          <?php echo $image ?>
        </a>
      </figure>
    </aside>

    <?php
    return ob_get_clean();
  }
}


if ( ! function_exists( 'log_lolla_display_topics_summary' ) ) {
  /**
   * Display topics summary
   *
   * Displays a text / paragraph containing all the category and tag descriptions merged together
   *
   * @param  integer $number_of_categories How many categories to show
   * @param  integer $number_of_tags       How many tags to show
   * @return string                        HTML
   */
  function log_lolla_display_topics_summary( $number_of_categories = 5, $number_of_tags = 5 ) {
    $categories = log_lolla_get_most_popular_terms_by_count( 'category', $number_of_categories );
    $tags = log_lolla_get_most_popular_terms_by_count( 'post_tag', $number_of_tags );
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


    $html = '<div class="shortcode-topics-summary">';

    $html .= esc_html_x( 'This site is about', 'log-lolla-pro' );
    $separator = esc_html_x( ', ', 'log-lolla-pro' );
    $html .= ' ';

    if ( ! empty( $categories_descriptions ) ) {
      $html .= implode( $separator, $categories_descriptions );
    }

    if ( ! empty( $tags_descriptions ) ) {
      $html .= implode( $separator, $tags_descriptions );
    }

    $html .= '.</div>';

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_get_term_description' ) ) {
  /**
   * Clean up the `term-description` Wordpress function
   * - It wraps the result in `<p>` tags
   * - It contains null strings
   *
   * @param  integer  $term     The term id
   * @param  string   $taxonomy The term's taxonomy
   * @return string             The cleaned up term description
   */
  function log_lolla_get_term_description( $term_id, $taxonomy ) {
    return trim( strip_tags( term_description( $term_id, $taxonomy ) ) );
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


 if ( ! function_exists( 'log_lolla_adjust_range_for_sparkline' ) ) {
   /**
    * Adjust range for a sparkline
    *
    * The sparkline font takes value from 0-99
    * If a sparkline item is bigger than 100 the sparkline graphics is broken
    * If a sparkline item is to small (1, 12) the sparkline graphics will be very flat
    *
    * What we need to to is to transform sparkline items to be less than 99, and,
    * multiply small items with 10 ... or something like this
    *
    * @param  Array $sparklines The array of sparklines
    * @return Array             The adjusted array of sparklines
    */
   function log_lolla_adjust_range_for_sparkline( $sparklines ) {
     $adjusted = [];

     $min = min( $sparklines );
     $max = max( $sparklines );

     foreach ( $sparklines as $sparkline ) {
       $adjusted[] = log_lolla_linear_conversion_of_a_range( $sparkline, $min, $max, 0, 99 );
     }

     return $adjusted;
   }
 }


 if ( ! function_exists( 'log_lolla_linear_conversion_of_a_range' ) ) {
   /**
    * Convert a range to another range
    *
    * Source: https://stackoverflow.com/questions/929103/convert-a-number-range-to-another-range-maintaining-ratio#929107
    *
    * @param  integer $old_value The value which needs to be converted
    * @param  integer $old_min   The lower part of the original range
    * @param  integer $old_max   The upper part of the original range
    * @param  integer $new_min   The lower part of the new range
    * @param  integer $new_max   The upper part of the original range
    * @return integer            The new value
    */
   function log_lolla_linear_conversion_of_a_range( $old_value, $old_min, $old_max, $new_min, $new_max ) {
     $old_range = $old_max - $old_min;

     if ( $old_range == 0) {
       return $new_min;
     } else {
       $new_range = $new_max - $new_min;
       return round( ( ( $old_value - $old_min ) * $new_range ) / $old_range ) + $new_min;
     }
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
    * Returns something like:
    *  Array ( [0] => WP_Term Object ( [term_id] => 2 [name] => Emerging [slug] => emerging [term_group] => 0 [term_taxonomy_id] => 2 [taxonomy] => category [description] => [parent] => 0 [count] => 41 [filter] => raw ) [1] => WP_Term Object ( [term_id] => 7 [name] => Wordpress Themes [slug] => wordpress-themes
    *
    * @param  string $taxonomy The taxonomy id like 'category', 'post_tag'
    * @param  integer $how_many How many terms to get
    * @return array           An array of term objects
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


 if (! function_exists( 'log_lolla_sticky_post_text' ) ) {
   /**
    * Returns a text / HTML for a sticky post
    *
    * @return string
    */
   function log_lolla_sticky_post_text() {
     /* translators: sticky post text. */
     return esc_html_x( 'Featured', 'sticky post text', 'log-lolla' );
   }
 }


if (! function_exists( 'log_lolla_word_count' ) ) {
  /**
   * Count words in a text
   *
   * @link http://www.thomashardy.me.uk/wordpress-word-count-function
   *
   * @return integer
   */
  function log_lolla_word_count( $text ) {
    return str_word_count( $text );
  }
}



if ( ! function_exists( 'log_lolla_get_post_first_image_url' ) ) {
  /**
  * Get the first image from each post and resize it.
  * Returns an URL
  *
  * @link https://css-tricks.com/snippets/wordpress/get-the-first-image-from-a-post/
  *
  * @return string $first_img.
  *
  */
 function log_lolla_get_post_first_image_url() {
 	global $post;
 	$first_img = '';

  preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', do_shortcode( $post->post_content, 'gallery' ), $matches );
  $first_img = isset( $matches[1][0] ) ? $matches[1][0] : null;

 	if ( empty( $first_img ) ) {
 		return get_template_directory_uri() . '/assets/images/empty.png'; // path to default image.
 	}

	return $first_img;
 }
}


 if ( ! function_exists( 'log_lolla_add_arrow_to_link_title' ) ) {
   /**
    * Add arrow after the link title
    *
    * @return string
    */
   function log_lolla_add_arrow_to_link_title( $title ) {
    $arrow = log_lolla_get_arrow_html( 'right' );

    return $title . $arrow;
   }
 }



if ( ! function_exists( 'log_lolla_post_has_link' ) ) {
 /**
 * Return true if post has link
 *
 * @return boolen
 */
function log_lolla_post_has_link() {
  $has_title = the_title_attribute( 'echo=0');

  return ( ! empty( $has_title ) );
 }
}



if ( ! function_exists( 'log_lolla_get_link_title_for_link_post_format' ) ) {
  /**
  * Return link title for the link post format
  * Returns either the post title, or url where it points
  *
  * @return string
  */
 function log_lolla_get_link_title_for_link_post_format( $url ) {
   $has_title = the_title_attribute( 'echo=0');

   return ( ! empty( $has_title ) ) ? $has_title : $url;
  }
}


if ( ! function_exists( 'log_lolla_post_link_is_external' ) ) {
  /**
   * Return true is the post link is external
   *
   * @return boolean
   */
  function log_lolla_post_link_is_external() {
    $url = log_lolla_get_link_from_content();
    return ($url === apply_filters( 'the_permalink', get_permalink() ));
  }
}


if ( ! function_exists( 'log_lolla_get_link_from_content_class' ) ) {
  /**
   * Return a class for the link post format
   *
   * @return string
   */
  function log_lolla_get_link_from_content_class( $url ) {
    return ($url === apply_filters( 'the_permalink', get_permalink() )) ? 'local-link' : 'external-link';
  }
}


if ( ! function_exists( 'log_lolla_get_link_from_content' ) ) {
  /**
   * Return link from post content for the link post format
   * Returns either the link, or the post permalink if the link cannot be get
   *
   * @return string
   */
  function log_lolla_get_link_from_content() {
    $content = get_the_content();
  	$has_url = get_url_in_content( $content );

  	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
  }
}


if ( ! function_exists( 'log_lolla_post_class' ) ) {
  /**
   * Returns a custom post class
   *
   * @return string
   */
   function log_lolla_post_class() {
     // Changing the post grid based on how long a post & it's excerpt is
     $max_word_count = 50;

     $post_word_count = log_lolla_word_count( strip_tags( get_the_content() ) );
     $grid = ( $post_word_count < $max_word_count ) ? ' display-horizontal' : ' display-vertical';
     $klass = '';

     if ( has_excerpt() ) {
       $excerpt_word_count = log_lolla_word_count( strip_tags( get_the_excerpt() ) );
       $grid = ( $excerpt_word_count < $max_word_count ) ? ' display-horizontal' : ' display-vertical';
       $klass .= ' has-excerpt';
     }

     if ( has_post_thumbnail() ) {
       $klass .= ' has-thumbnail';
     }

     return $grid . $klass;
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


if ( ! function_exists( 'log_lolla_get_arrow_html' ) ) {
 /**
  * Return HTML markup for an arrow
  *
  * @param [string] $direction the arrow direction liek top, left, right, bottom
  *
  * @return string
  */
 function log_lolla_get_arrow_html( $direction ) {
   return '<span class="arrow-with-triangle arrow-with-triangle--' . $direction . '">
 					  	<span class="arrow-with-triangle__line"></span>
 					  	<span class="triangle triangle-- arrow-with-triangle__triangle"></span>
 						</span>';
 }
}



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


if ( ! function_exists( 'log_lolla_post_permalink' ) ) {
  /**
   * Prints HTML with meta information for the current post link
   *
   */
  function log_lolla_post_permalink() {
    printf(
      '<div class="permalink"><a class="link" href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute( 'echo=0') . '">%s</a></div>',
      /* translators: %s: post permalink. */
      esc_html_x( '&infin;', 'post permalink', 'log-lolla' )
    );
  }
}


if ( ! function_exists( 'log_lolla_post_author_linking_to_post' ) ) {
  /**
   * Prints HTML with meta information for the current post author
   *
   */
  function log_lolla_post_author_linking_to_post() {
    printf(
      '<div class="byline"><span class="author vcard"><a class="link" href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute( 'echo=0') . '">%s' . esc_html( get_the_author() ) . '</a></span></div>',
      /* translators: %s: status update by. */
      esc_html_x( 'status update by ', 'status update by', 'log-lolla' )
    );
  }
}



if ( ! function_exists( 'log_lolla_post_author' ) ) {
  /**
   * Prints HTML with meta information for the current post author
   *
   */
  function log_lolla_post_author() {
    printf(
      '<div class="byline">%s <span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></div>',
			/* translators: %s: post author. */
			esc_html_x( 'by', 'post author', 'log-lolla' )
		);
  }
}


if ( ! function_exists( 'log_lolla_post_date_and_time' ) ) {
  /**
   * Prints HTML with meta information for the current post-date/time
   *
   * The date format is set on the admin interface
   * Preferably to 'M j, y'
   */
  function log_lolla_post_date_and_time() {
    printf(
			'<div class="posted-on"><time class="date published" datetime="%1$s">%2$s</time></div>',
			esc_attr( get_the_date( 'c' ) . ', ' .  get_the_time( 'c' ) ),
			esc_html( get_the_date() . ', ' . get_the_time() )
		);
  }
}



if ( ! function_exists( 'log_lolla_post_date' ) ) {
  /**
   * Prints HTML with meta information for the current post-date/time
   *
   * The date format is set on the admin interface
   * Preferably to 'M j, y'
   */
  function log_lolla_post_date() {
    printf(
			'<div class="posted-on"><time class="date published" datetime="%1$s">%2$s</time></div>',
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);
  }
}


if (! function_exists( 'log_lolla_post_categories' ) ) {
  /**
   * Prints HTML with meta information for the categories
   */
  function log_lolla_post_categories() {
    $categories_list = get_the_category_list( esc_html__( ', ', 'log-lolla' ) );

    if ( $categories_list ) {
      /* translators: 1: list of categories. */
      printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s. ', 'log-lolla' ) . '</span>', $categories_list ); // WPCS: XSS OK.
    }
  }
}


if (! function_exists( 'log_lolla_post_tags' ) ) {
  /**
   * Prints HTML with meta information for the tags
   */
  function log_lolla_post_tags() {
    $categories_list = get_the_category_list( esc_html__( ', ', 'log-lolla' ) );

    /* translators: used between list items, there is a space after the comma */
    $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'log-lolla' ) );
    if ( $tags_list ) {
      /* translators: 1: list of tags. */
      printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s. ', 'log-lolla' ) . '</span>', $tags_list ); // WPCS: XSS OK.
    }
  }
}


if (! function_exists( 'log_lolla_post_edit_link' ) ) {
  /**
   * Prints HTML with meta information for the edit link
   */
  function log_lolla_post_edit_link() {
    edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'log-lolla' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
  }
}
?>
