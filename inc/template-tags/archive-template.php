<?php
/**
 * Template tags for Archives.
 *
 * @link https://codex.wordpress.org/Template_Tags
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( ! function_exists( 'log_lolla_pro_get_archive_counter_list' ) ) {
	/**
	 * Get a list of Archive counters.
	 *
	 * Counters are like number of posts, number of related topics, and so on.
	 * Some of the counters have to be calculated apriori and set as global variables which are reused here.
	 *
	 * @param  array $archive A list of posts.
	 * @return array          An array of numbers.
	 */
	function log_lolla_pro_get_archive_counter_list( $archive ) {
		if ( empty( $archive ) ) {
			return;
		}

		global $summaries_count;
		global $standard_posts_count;
		global $related_topics_count;

		$ret = [];

		$ret[] = $archive->count ? $archive->count : 0;
		$ret[] = is_null( $summaries_count ) ? 0 : $summaries_count;
		$ret[] = is_null( $standard_posts_count ) ? 0 : $standard_posts_count;
		$ret[] = is_null( $related_topics_count ) ? 0 : $related_topics_count;

		return $ret;
	}
}


if ( ! function_exists( 'log_lolla_pro_get_archive_list_by_year_and_months_as_html' ) ) {
	/**
	 * Displays a list of a year and months archive.
	 *
	 * @return string HTML
	 */
	function log_lolla_pro_get_archive_list_by_year_and_months_as_html() {
		$archives = log_lolla_pro_get_archive_list_by_year_and_months();

		$dates = log_lolla_pro_group_archive_list_by_year_and_months( $archives );
		if ( empty( $dates ) ) {
			return;
		}

		$html = '';

		ob_start();
		foreach ( $dates as $archive_year => $archive_months ) {
			set_query_var( 'archive_year', $archive_year );
			set_query_var( 'archive_months', $archive_months );

			get_template_part( 'template-parts/archive/archive', 'year-and-months' );
		}

		$html .= ob_get_clean();

		return $html;
	}
}


if ( ! function_exists( 'log_lolla_pro_group_archive_list_by_year_and_months' ) ) {
	/**
	 * Groups archives into an array of years and months
	 *
	 * Return something like:
	 *  Array ( [2017] => Array ( [0] => 12 ) [2018] => Array ( [0] => 01 [1] => 02 [2] => 03 ) )
	 *
	 * @param  array $archives An array of objects.
	 * @return array           An array of arrays
	 */
	function log_lolla_pro_group_archive_list_by_year_and_months( $archives ) {
		if ( empty( $archives ) ) {
			return;
		}

		// Get an array with timestamps like 2017-12-05 14:27:58.
		$timestamps = array_map(
			function( $d ) {
				return $d->post_date;
			}, $archives
		);
		if ( empty( $timestamps ) ) {
			return;
		}

		// Get an array with dates like 2017-12, 2018-01, ...
		$dates = array_reverse(
			array_unique(
				array_map(
					function( $d ) {
						return date( 'Y-m', strtotime( $d ) );
					}, $timestamps
				)
			)
		);
		if ( empty( $dates ) ) {
			return;
		}

		// Create a multidimensional array like [2017] => [12], [2018] => [01, 02, 03].
		$ret = [];
		foreach ( $dates as $d ) {
			$split              = explode( '-', $d );
			$ret[ $split[0] ][] = $split[1];
		}

		return $ret;
	}
}


if ( ! function_exists( 'log_lolla_pro_get_archive_list_by_year_and_months' ) ) {
	/**
	 * Get all years and months when there were posts published.
	 *
	 * Returns an array of objects like:
	 *  Array ( [0] => stdClass Object ( [post_date] => 2017-12-05 14:27:58 [post_status] => publish ) [1] => stdClass Object ( [post_date] => 2017-12-06 07:13:21 [post_status] => publish ) ...
	 *
	 * @return array An array of objects
	 */
	function log_lolla_pro_get_archive_list_by_year_and_months() {
		global $wpdb;

		$results = $wpdb->get_results(
			"SELECT `post_date`, `post_status` FROM $wpdb->posts WHERE `post_status` = 'publish' GROUP BY `post_date`",
			OBJECT
		);

		return $results;
	}
}
