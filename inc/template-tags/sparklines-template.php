<?php
  /**
   * Template tags for sparklines
   *
   * @package Log_Lolla_Pro
   */



if ( ! function_exists( 'log_lolla_pro_display_sparklines_for_topic' ) ) {
	/**
	 * Display sparklines for a topic
	 *
	 * @param  Array  $sparkline_dates              The array of dates for each sparkline
	 * @param  Object $item                       A term
	 * @return string                              HTML
	 */
	function log_lolla_pro_display_sparklines_for_topic( $sparkline_dates, $item ) {
		$sparklines = log_lolla_pro_get_sparklines_for_topic( $sparkline_dates, $item );
		if ( empty( $sparklines ) ) {
			return;
		}

		$sparklines = log_lolla_pro_adjust_range_for_sparkline( $sparklines );

		return '{' . implode( ',', $sparklines ) . '}';
	}
}



if ( ! function_exists( 'log_lolla_pro_get_sparklines_for_topic' ) ) {
	/**
	 * Get the sparklines for a topic (category, tag)
	 *
	 * @param  Array  $sparkline_dates              The array of dates for each sparkline
	 * @param  Object $item                       A term
	 * @return Array                               An array of integers
	 */
	function log_lolla_pro_get_sparklines_for_topic( $sparkline_dates, $item ) {
		if ( empty( $item ) ) {
			return;
		}
		if ( empty( $sparkline_dates ) ) {
			return;
		}

		$sparklines = [];

		for ( $i = 0; $i < count( $sparkline_dates ) - 1; $i++ ) {
			$posts = get_posts(
				array(
					'post_type'      => 'post',
					'post_status'    => 'publish',
					'posts_per_page' => -1,
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => $item->taxonomy,
							'field'    => 'slug',
							'terms'    => $item->slug,
						),
					),
					'date_query'     => array(
						array(
							'after'  => date( 'Y-m-d', strtotime( $sparkline_dates[ $i ] ) ),
							'before' => date( 'Y-m-d', strtotime( $sparkline_dates[ $i + 1 ] ) ),
						),
					),
				)
			);

			$sparklines[] = count( $posts );
		}

		return $sparklines;
	}
}



if ( ! function_exists( 'log_lolla_pro_adjust_range_for_sparkline' ) ) {
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
	function log_lolla_pro_adjust_range_for_sparkline( $sparklines ) {
		$adjusted = [];

		$min = min( $sparklines );
		$max = max( $sparklines );

		foreach ( $sparklines as $sparkline ) {
			$adjusted[] = log_lolla_pro_linear_conversion_of_a_range( $sparkline, $min, $max, 0, 99 );
		}

		return $adjusted;
	}
}


if ( ! function_exists( 'log_lolla_pro_get_sparkline_dates' ) ) {
	/**
	 * Get the dates corresponding to a set of sparkline
	 *
	 * @param  integer $sparklines Total number of sparkines
	 * @return array               An array of dates
	 */
	function log_lolla_pro_get_sparkline_dates( $sparklines ) {
		// Get the first post and the last post dates
		$post_dates = log_lolla_pro_get_first_post_and_last_post_date();
		if ( empty( $post_dates ) ) {
			return;
		}

		// Number of days since the first post (ie. 110)
		$date1          = new DateTime( $post_dates[0] );
		$date2          = new DateTime( $post_dates[1] );
		$number_of_days = $date2->diff( $date1 )->format( '%a' );

		// Number of days for a sparkline unit (ie 11, from 110 / $sparklines)
		$number_of_days_per_sparkline = round( $number_of_days / $sparklines );

		$dates = [];

		$date = $date1;
		while ( $date <= $date2 ) {
			// If we don't convert $date to string then always the same date will be added to the $dates array ...
			$dates[] = $date->format( 'Y-m-d' );
			$date    = $date->modify( '+' . $number_of_days_per_sparkline . ' days' );
		}

		return $dates;
	}
}


