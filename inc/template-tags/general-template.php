<?php
  /**
   * General template tags for this theme
   *
   * Contains custom template tags not groupable into a special template tag file
   *
   * @link https://codex.wordpress.org/Template_Tags
   *
   * @package Log_Lolla
   */
?>

<?php

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




?>