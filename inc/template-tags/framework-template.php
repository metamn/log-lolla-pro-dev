<?php
  /**
   * Common template tags
   *
   * Contains custom, reusable template tags specific for this theme
   *
   * @link https://codex.wordpress.org/Template_Tags
   *
   * @package Log_Lolla_Pro
   */



if ( ! function_exists( 'log_lolla_get_link_html_for' ) ) {
  /**
   * Get the link for a special page or archive
   *
   * @param  string $object The special page or archive title
   * @return string         HTML
   */
  function log_lolla_get_link_html_for( $object ) {
    switch ($object) {
      case 'Home':
        $url = esc_url( home_url( '/' ) );
        $title = esc_html__( 'Home', 'log-lolla' );
        $content = $title;
        break;

      case 'Archives':
        $page = get_page_by_title( 'Archives' );

        if ( isset( $page ) ) {
          $url = esc_url( get_permalink( $page ) );
          $title = esc_html__( 'Archives', 'log-lolla' );
          $content = $title;
        }
        break;

      case 'Tags':
        $page = get_page_by_title( 'Tags' );

        if ( isset( $page ) ) {
          $url = esc_url( get_permalink( $page ) );
          $title = esc_html__( 'Tags', 'log-lolla' );
          $content = $title;
        }
        break;

      case 'Categories':
        $page = get_page_by_title( 'Categories' );

        if ( isset( $page ) ) {
          $url = esc_url( get_permalink( $page ) );
          $title = esc_html__( 'Categories', 'log-lolla' );
          $content = $title;
        }
        break;

      case 'Sources':
        $url = esc_url( get_post_type_archive_link( 'source' ) );
        $title = esc_html__( 'Sources', 'log-lolla' );
        $content = $title;
        break;

      case 'People':
        $url = esc_url( get_post_type_archive_link( 'people' ) );
        $title = esc_html__( 'People', 'log-lolla' );
        $content = $title;
        break;

      case 'Summaries':
        $url = esc_url( get_post_type_archive_link( 'summary' ) );
        $title = esc_html__( 'Summaries', 'log-lolla' );
        $content = $title;
        break;

      default:
        # code...
        break;
    }

    if ( isset( $url ) ) {
      return '<a class="link" href="' . $url .'" title="' . $title . '">' . $content . '</a>';
    }
  }
}


if ( ! function_exists( 'log_lolla_get_image_not_found_url' ) ) {
  /**
   * Get the image name / url to display when an image is not found
   *
   * @return string Image url and name
   */
  function log_lolla_get_image_not_found_url() {
    return '/assets/images/image-not-found.png';
  }
}


if ( ! function_exists( 'log_lolla_get_arrow_html' ) ) {
  /**
   * Return HTML markup for an arrow
   *
   * @param   string $direction The arrow direction like top, left, right, bottom
   * @return  string            HTML
   */
  function log_lolla_get_arrow_html( $direction ) {
    $html = '';

    ob_start();
    set_query_var( 'arrow_direction', $direction );
    get_template_part( 'template-parts/framework/design/decorations/arrow-with-triangle/arrow-with-triangle', '' );
    $html .= ob_get_clean();

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_get_triangle_html' ) ) {
  /**
   * Return HTML markup for a triangle
   *
   * @param   string $direction The arrow direction like top, left, right, bottom
   * @return  string            HTML
   */
  function log_lolla_get_triangle_html( $direction ) {
    $html = '';

    ob_start();
    set_query_var( 'triangle_direction', $direction );
    get_template_part( 'template-parts/framework/design/decorations/triangle/triangle', '' );
    $html .= ob_get_clean();

    return $html;
  }
}



if ( ! function_exists( 'log_lolla_remove_object_from_array_by_key' ) ) {
 /**
  * Remove object from an array by key
  *
  * @link https://secure.php.net/manual/en/function.array-search.php
  *
  * @param  array   $array  [description]
  * @param  [type]  $value  [description]
  * @param  boolean $strict [description]
  * @return [type]          [description]
  */
 function log_lolla_remove_object_from_array_by_key( array $array, $value, $key ) {
   if ( ( $index = array_search( $value, array_column( $array, $key ) ) ) !== FALSE ) {
     unset( $array[$index] );
   }

   return $array;
 }
}


if ( ! function_exists( 'log_lolla_remove_object_from_array' ) ) {
  /**
   * Remove object from an array
   *
   * @link http://stackoverflow.com/questions/3573313/php-remove-object-from-array
   *
   * @param  array   $array  [description]
   * @param  [type]  $value  [description]
   * @param  boolean $strict [description]
   * @return [type]          [description]
   */
  function log_lolla_remove_object_from_array( array $array, $value, $strict = TRUE ) {
    if ( ( $key = array_search( $value, $array, $strict ) ) !== FALSE ) {
      unset( $array[$key] );
    }

    return array_values( $array );
  }
}


if ( ! function_exists( 'log_lolla_array_unique_objects' ) ) {
  function log_lolla_uniquecol( $obj ) {
    static $idlist = array();

    if ( in_array( $obj->ID, $idlist ) )
      return false;

    $idlist[] = $obj->ID;
    return true;
  }

  /**
   * PHP's array_unique of array of objects
   *
   * @param  array $array An array of objects
   * @return array        An array of unique objects
   */
  function log_lolla_array_unique_objects( $array ) {
    $unique = array_filter($array, 'log_lolla_uniquecol');
    return $unique;
  }
}


if ( ! function_exists( 'log_lolla_array_flatten' ) ) {
  /**
   * Flatten an array
   *
   * @param  array  $array An array to be flattened
   * @return array        The flattened array
   */
  function log_lolla_array_flatten( array $array ) {
    $flattened_array = array();
    array_walk_recursive($array, function($a) use (&$flattened_array) { $flattened_array[] = $a; });
    return $flattened_array;
  }
}



if ( ! function_exists( 'log_lolla_create_sentence_from_arrays' ) ) {
  /**
   * Create a sentence from two arrays of text
   *
   * @param  Array $array1  The first array
   * @param  Array $array2  The second array
   * @return string         The sentence
   */
  function log_lolla_create_sentence_from_arrays( $array1, $array2 ) {
    $ret = '';

    $ret .= esc_html_x( 'This site is about', 'log-lolla-pro' );
    $ret .= ' ';

    $separator = esc_html_x( ', ', 'log-lolla-pro' );
    $connector = esc_html_x( 'and', 'log-lolla-pro' );

    if ( ! empty( $array1 ) ) {
      if ( ! empty( $array2) ) {
        $ret .= implode( $separator, $array1 );
      } else {
        $ret .= log_lolla_implode_with_conjunction( $array1,  $separator, $connector );
      }

    }

    if ( ! empty( $array2 ) ) {
      if ( ! empty( $array1 ) ) {
        $ret .= ', ';

        if ( count($array2) == 1 ) {
          $ret .= $connector . ' ';
        }
      }

      $ret .= log_lolla_implode_with_conjunction( $array2,  $separator, $connector );
    }

    return $ret;
  }
}


if ( ! function_exists( 'log_lolla_implode_with_conjunction' ) ) {
  /**
   * An `implode()` which adds $conjunction as the last $separator
   *
   * Example: ['one', 'two', 'three'], ',', 'and' => one, two and three
   *
   * @link https://stackoverflow.com/questions/8586141/implode-array-with-and-add-and-before-last-item
   *
   * @param  Array  $array       The array of strings
   * @param  string $separator   The separator
   * @param  string $conjunction The conjunction
   * @return string              The result
   */
  function log_lolla_implode_with_conjunction( $array, $separator, $conjunction ) {
    $last = array_pop( $array );

    if ( $array ) {
      return implode( $separator, $array ) . ' ' . $conjunction . ' ' . $last;
    }

    return $last;
  }
}


if ( ! function_exists( 'log_lolla_convert_string_to_classname' ) ) {
  /**
   * Convert a string to a classname
   *
   * @param  string $string The string to be converted
   * @return string         The classname
   */
  function log_lolla_convert_string_to_classname( $string ) {
    $a = preg_replace( "/([^a-z0-9]+)/i", "-", $string );
    $b = preg_replace( "/ /", "-", $a );

    $ret = strtolower($b);

    return $ret;
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


if (! function_exists( 'log_lolla_word_count' ) ) {
  /**
   * Count words in a text
   *
   * @link http://www.thomashardy.me.uk/wordpress-word-count-function
   *
   * @param   string  $text   The text
   * @return  integer         The number of words
   */
  function log_lolla_word_count( $text ) {
    return str_word_count( $text );
  }
}

?>
