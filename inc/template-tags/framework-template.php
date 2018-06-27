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

if ( ! function_exists( 'log_lolla_pro_get_pictogram_list' ) ) {
	/**
	 * Get pictograms of an Archive.
	 *
	 * Pictograms are visual summaries of what's included in an Archive.
	 *
	 * @param  array $counters An array of counters for an Archive.
	 * @return array           An array of counters formatted to be displayed as pictograms.
	 */
	function log_lolla_pro_get_pictogram_list( $counters ) {
		$pictograms = [];

		$pictograms[] = array(
			'text'     => esc_html__( 'Posts', 'log-lolla-pro-pro' ),
			'number'   => $counters[0],
			'scrollto' => 'archive-list--posts',
			'klass'    => ( $counters[0] > 0 ) ? 'activable' : 'inactivable',
		);

		$pictograms[] = array(
			'text'     => esc_html__( 'Summaries', 'log-lolla-pro-pro' ),
			'number'   => $counters[1],
			'scrollto' => 'archive-list--summaries',
			'klass'    => ( $counters[1] > 0 ) ? 'activable' : 'inactivable',
		);

		$pictograms[] = array(
			'text'     => esc_html__( 'Thoughts', 'log-lolla-pro-pro' ),
			'number'   => $counters[2],
			'scrollto' => 'archive-list--standard-posts',
			'klass'    => ( $counters[2] > 0 ) ? 'activable' : 'inactivable',
		);

		$pictograms[] = array(
			'text'     => esc_html__( 'Related topics', 'log-lolla-pro-pro' ),
			'number'   => $counters[3],
			'scrollto' => 'archive-list--related-topics',
			'klass'    => ( $counters[3] > 0 ) ? 'activable' : 'inactivable',
		);

		return $pictograms;
	}
}


if ( ! function_exists( 'log_lolla_pro_get_classname_bem' ) ) {
	/**
	 * Get a class name using the BEM convention.
	 *
	 * @param  string $block    The main part of the class.
	 * @param  string $modifier The modifier part of a class.
	 * @return string           A BEM classname.
	 */
	function log_lolla_pro_get_classname_bem( $block, $modifier ) {
		if ( empty( $modifier ) ) {
			return;
		}
		if ( empty( $block ) ) {
			return $modifier;
		}

		return $block . '--' . $modifier;
	}
}


if ( ! function_exists( 'log_lolla_pro_get_link_html' ) ) {
	/**
	 * Get the link for a special page or archive
	 *
	 * @param  string $item The special page or archive title.
	 * @return string       HTML
	 */
	function log_lolla_pro_get_link_html( $item ) {
		switch ( $item ) {
			case 'Home':
				$url     = esc_url( home_url( '/' ) );
				$title   = esc_html__( 'Home', 'log-lolla-pro' );
				$content = $title;
				break;

			case 'Archives':
				$page = get_page_by_title( 'Archives' );

				if ( isset( $page ) ) {
					$url     = esc_url( get_permalink( $page ) );
					$title   = esc_html__( 'Archives', 'log-lolla-pro' );
					$content = $title;
				}
				break;

			case 'Tags':
				$page = get_page_by_title( 'Tags' );

				if ( isset( $page ) ) {
					$url     = esc_url( get_permalink( $page ) );
					$title   = esc_html__( 'Tags', 'log-lolla-pro' );
					$content = $title;
				}
				break;

			case 'Categories':
				$page = get_page_by_title( 'Categories' );

				if ( isset( $page ) ) {
					$url     = esc_url( get_permalink( $page ) );
					$title   = esc_html__( 'Categories', 'log-lolla-pro' );
					$content = $title;
				}
				break;

			case 'Sources':
				$url     = esc_url( get_post_type_archive_link( 'source' ) );
				$title   = esc_html__( 'Sources', 'log-lolla-pro' );
				$content = $title;
				break;

			case 'People':
				$url     = esc_url( get_post_type_archive_link( 'people' ) );
				$title   = esc_html__( 'People', 'log-lolla-pro' );
				$content = $title;
				break;

			case 'Summaries':
				$url     = esc_url( get_post_type_archive_link( 'summary' ) );
				$title   = esc_html__( 'Summaries', 'log-lolla-pro' );
				$content = $title;
				break;

			default:
				// code...
				break;
		}

		$html = '';

		if ( isset( $url ) ) {
			ob_start();

			set_query_var( 'link-url', $url );
			set_query_var( 'link-title', $title );
			set_query_var( 'link-content', $content );
			get_template_part( 'template-parts/framework/design/typography/elements/link/link', '' );

			$html .= ob_get_clean();
		}

		return $html;
	}
}


if ( ! function_exists( 'log_lolla_pro_get_image_url_not_found' ) ) {
	/**
	 * Get the image name / url to display when an image is not found
	 *
	 * @return string Image url and name
	 */
	function log_lolla_pro_get_image_url_not_found() {
		return '/assets/images/image-not-found.png';
	}
}


if ( ! function_exists( 'log_lolla_pro_get_arrow_html' ) ) {
	/**
	 * Return HTML markup for an arrow
	 *
	 * @param   string $direction The arrow direction like top, left, right, bottom.
	 * @return  string            HTML
	 */
	function log_lolla_pro_get_arrow_html( $direction ) {
		$html = '';

		ob_start();

		set_query_var( 'arrow_direction', $direction );
		get_template_part( 'template-parts/framework/design/decorations/arrow-with-triangle/arrow-with-triangle', '' );

		$html .= ob_get_clean();

		return $html;
	}
}


if ( ! function_exists( 'log_lolla_pro_get_triangle_html' ) ) {
	/**
	 * Return HTML markup for a triangle
	 *
	 * @param   string $direction The arrow direction like top, left, right, bottom.
	 * @return  string            HTML
	 */
	function log_lolla_pro_get_triangle_html( $direction ) {
		$html = '';

		ob_start();

		set_query_var( 'triangle_direction', $direction );
		get_template_part( 'template-parts/framework/design/decorations/triangle/triangle', '' );

		$html .= ob_get_clean();

		return $html;
	}
}



if ( ! function_exists( 'log_lolla_pro_remove_object_from_array_by_key' ) ) {
	/**
	 * Remove object from an array by key
	 *
	 * @link https://secure.php.net/manual/en/function.array-search.php
	 *
	 * @param  array $array The array.
	 * @param  mixed $value The object of the array.
	 * @param  mixed $key   The key to be removed.
	 * @return array        An array with the object removed.
	 */
	function log_lolla_pro_remove_object_from_array_by_key( array $array, $value, $key ) {
		$index = array_search( $value, array_column( $array, $key ), true );

		if ( false !== $index ) {
			unset( $array[ $index ] );
		}

		return $array;
	}
}


if ( ! function_exists( 'log_lolla_pro_remove_object_from_array' ) ) {
	/**
	 * Remove object from an array
	 *
	 * @link http://stackoverflow.com/questions/3573313/php-remove-object-from-array
	 *
	 * @param  array   $array  The array.
	 * @param  mixed   $value  The object of the array.
	 * @param  boolean $strict To set strict type comparision or not.
	 * @return array           The array with the object removed.
	 */
	function log_lolla_pro_remove_object_from_array( array $array, $value, $strict = true ) {
		$key = array_search( $value, $array, $strict );

		if ( false !== $key ) {
			unset( $array[ $key ] );
		}

		return array_values( $array );
	}
}


if ( ! function_exists( 'log_lolla_pro_filter_array_of_duplicated_objects' ) ) {
	/**
	 * Filter out duplicated objects in an array.
	 *
	 * Must be used in an `array_filter` function call.
	 *
	 * @link https://stackoverflow.com/questions/2426557/array-unique-for-objects
	 *
	 * @param  mixed $object The element of the array.
	 * @return boolean       If the element is already in the array.
	 */
	function log_lolla_pro_filter_array_of_duplicated_objects( $object ) {
		static $idlist = array();

		if ( in_array( $obj->ID, $idlist, true ) ) {
			return false;
		}

		$idlist[] = $obj->ID;
		return true;
	}
}


if ( ! function_exists( 'log_lolla_pro_get_array_unique_objects' ) ) {
	/**
	 * PHP's array_unique of array of objects
	 *
	 * @link https://stackoverflow.com/questions/2426557/array-unique-for-objects
	 *
	 * @param  array $array An array of objects.
	 * @return array        An array of unique objects.
	 */
	function log_lolla_pro_array_unique_objects( $array ) {
		$unique = array_filter( $array, 'log_lolla_pro_filter_array_of_duplicated_objects' );

		return $unique;
	}
}


if ( ! function_exists( 'log_lolla_pro_flatten_array_multidimensional' ) ) {
	/**
	 * Flatten a multidimensional array.
	 *
	 * @link https://stackoverflow.com/questions/1319903/how-to-flatten-a-multidimensional-array#1320156
	 *
	 * @param  array $array An array to be flattened.
	 * @return array        The flattened array
	 */
	function log_lolla_pro_flatten_array_multidimensional( array $array ) {
		$flattened_array = array();

		array_walk_recursive(
			$array, function( $a ) use ( &$flattened_array ) {
				$flattened_array[] = $a;
			}
		);

		return $flattened_array;
	}
}



if ( ! function_exists( 'log_lolla_pro_create_sentence_from_arrays' ) ) {
	/**
	 * Create a sentence from two arrays of text
	 *
	 * @param  Array $array1  The first array.
	 * @param  Array $array2  The second array.
	 * @return string         The sentence.
	 */
	function log_lolla_pro_create_sentence_from_arrays( $array1, $array2 ) {
		$ret = '';

		$ret .= esc_html_x( 'This site is about', 'log-lolla-pro' );
		$ret .= ' ';

		$separator = esc_html_x( ', ', 'log-lolla-pro' );
		$connector = esc_html_x( 'and', 'log-lolla-pro' );

		if ( ! empty( $array1 ) ) {
			if ( ! empty( $array2 ) ) {
				$ret .= implode( $separator, $array1 );
			} else {
				$ret .= log_lolla_pro_implode_with_conjunction( $array1, $separator, $connector );
			}
		}

		if ( ! empty( $array2 ) ) {
			if ( ! empty( $array1 ) ) {
				$ret .= ', ';

				if ( count( $array2 ) === 1 ) {
					$ret .= $connector . ' ';
				}
			}

			$ret .= log_lolla_pro_implode_with_conjunction( $array2, $separator, $connector );
		}

		return $ret;
	}
}


if ( ! function_exists( 'log_lolla_pro_implode_with_conjunction' ) ) {
	/**
	 * An `implode()` which adds $conjunction as the last $separator
	 *
	 * Example: ['one', 'two', 'three'], ',', 'and' => one, two and three
	 *
	 * @link https://stackoverflow.com/questions/8586141/implode-array-with-and-add-and-before-last-item
	 *
	 * @param  Array  $array       The array of strings.
	 * @param  string $separator   The separator.
	 * @param  string $conjunction The conjunction.
	 * @return string              The result
	 */
	function log_lolla_pro_implode_with_conjunction( $array, $separator, $conjunction ) {
		$last = array_pop( $array );

		if ( $array ) {
			return implode( $separator, $array ) . ' ' . $conjunction . ' ' . $last;
		}

		return $last;
	}
}


if ( ! function_exists( 'log_lolla_pro_convert_string_to_classname' ) ) {
	/**
	 * Convert a string to a classname
	 *
	 * @param  string $string The string to be converted.
	 * @return string         The classname
	 */
	function log_lolla_pro_convert_string_to_classname( $string ) {
		$a = preg_replace( '/([^a-z0-9]+)/i', '-', $string );
		$b = preg_replace( '/ /', '-', $a );

		$ret = strtolower( $b );

		return $ret;
	}
}


if ( ! function_exists( 'log_lolla_pro_get_linear_conversion_of_a_range' ) ) {
	/**
	 * Convert a range to another range
	 *
	 * Source: https://stackoverflow.com/questions/929103/convert-a-number-range-to-another-range-maintaining-ratio#929107
	 *
	 * @param  integer $old_value The value which needs to be converted.
	 * @param  integer $old_min   The lower part of the original range.
	 * @param  integer $old_max   The upper part of the original range.
	 * @param  integer $new_min   The lower part of the new range.
	 * @param  integer $new_max   The upper part of the original range.
	 * @return integer            The new value.
	 */
	function log_lolla_pro_get_linear_conversion_of_a_range( $old_value, $old_min, $old_max, $new_min, $new_max ) {
		$old_range = $old_max - $old_min;

		if ( 0 === $old_range ) {
			return $new_min;
		} else {
			$new_range = $new_max - $new_min;
			return round( ( ( $old_value - $old_min ) * $new_range ) / $old_range ) + $new_min;
		}
	}
}


if ( ! function_exists( 'log_lolla_pro_count_words' ) ) {
	/**
	 * Count words in a text
	 *
	 * @link http://www.thomashardy.me.uk/wordpress-word-count-function
	 *
	 * @param   string $text   The text.
	 * @return  integer        The number of words
	 */
	function log_lolla_pro_count_words( $text ) {
		return str_word_count( $text );
	}
}
