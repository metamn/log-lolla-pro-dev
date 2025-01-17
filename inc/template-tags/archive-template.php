<?php
/**
 * Template tags for Archives.
 *
 * @link https://codex.wordpress.org/Template_Tags
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( ! function_exists( 'log_lolla_pro_get_archive_label' ) ) {
	/**
	 * Returns the label of an archive.
	 *
	 * @param  string $archive_type The archive name.
	 * @return string               The translated archive name.
	 */
	function log_lolla_pro_get_archive_label( $archive_type ) {
		if ( empty( $archive_type ) ) {
			return;
		}

		switch ( $archive_type ) {
			case 'Archives by date':
				/* translators: The Archives by date name */
				return esc_html__( 'Archives by date', 'log-lolla-pro' );
			case 'Archives':
				/* translators: The Archives page name */
				return esc_html__( 'Archives', 'log-lolla-pro' );
			case 'Posts':
				/* translators: The title of the `Posts` counter in the archive header. */
				return esc_html__( 'Posts', 'log-lolla-pro' );
			case 'Summaries':
				return log_lolla_pro_get_post_type_label( 'summary' );
			case 'Thoughts':
				/* translators: The title of the `Thoughts` counter in the archive header. */
				return esc_html__( 'Thoughts', 'log-lolla-pro' );
			case 'Related topics':
				return log_lolla_pro_get_topic_label( 'Related topics' );
			default:
				return '';
		}
	}
}

if ( ! function_exists( 'log_lolla_pro_get_archive_counter_list' ) ) {
	/**
	 * Returns a list of Archive counters.
	 *
	 * Counters are like number of posts, number of related topics, and so on.
	 * The counters have to be calculated apriori and set as global variables which are reused here.
	 *
	 * @return array          An array of numbers.
	 */
	function log_lolla_pro_get_archive_counter_list() {
		global $archive_posts_count;
		global $summaries_count;
		global $standard_posts_count;
		global $related_topics_count;

		$ret = [];

		$ret[] = is_null( $archive_posts_count ) ? 0 : $archive_posts_count;
		$ret[] = is_null( $summaries_count ) ? 0 : $summaries_count;
		$ret[] = is_null( $standard_posts_count ) ? 0 : $standard_posts_count;
		$ret[] = is_null( $related_topics_count ) ? 0 : $related_topics_count;

		return $ret;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_pictogram_list' ) ) {
	/**
	 * Returns a list of pictograms of an Archive.
	 *
	 * Pictograms are visual summaries of what's included in an Archive.
	 *
	 * @param  array $counters An array of counters for an Archive.
	 * @return array           An array of counters formatted to be displayed as pictograms.
	 */
	function log_lolla_pro_get_pictogram_list( $counters ) {
		if ( empty( $counters ) ) {
			return;
		}

		$pictograms = [];

		$pictogram_texts = array(
			log_lolla_pro_get_archive_label( 'Posts' ),
			log_lolla_pro_get_archive_label( 'Summaries' ),
			log_lolla_pro_get_archive_label( 'Thoughts' ),
			log_lolla_pro_get_archive_label( 'Related topics' ),
		);

		$pictogram_classes = array(
			'post-list-for-archive',
			'summaries',
			'thoughts',
			'related-topics',
		);

		$pictogram_targets = array(
			'post-list--for-archive',
			'post-list--summaries',
			'post-list--thoughts',
			'topic-list--related-topics',
		);

		foreach ( $pictogram_texts as $index => $pictogram_text ) {
			$pictograms[] = array(
				'text'     => $pictogram_text,
				'number'   => $counters[ $index ],
				'scrollto' => $pictogram_targets[ $index ],
				'klass'    => ( 0 !== $counters[ $index ] ) ? 'activable' : 'inactivable',
			);
		}

		return $pictograms;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_archive_list_by_year_and_months_as_html' ) ) {
	/**
	 * Returns a list of a year and months archive.
	 *
	 * @param  string $title The title of the post list.
	 * @param  string $url   The link to the title of the post list.
	 * @return string        HTML
	 */
	function log_lolla_pro_get_archive_list_by_year_and_months_as_html( $title = '', $url = '' ) {
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

		ob_start();

		$list_query_vars = array(
			'klass' => 'archive-list archive-list--by-date',
			'title' => log_lolla_pro_get_list_title( $title, $url, 'List of posts' ),
			'items' => $html,
		);
		set_query_var( 'list-query-vars', $list_query_vars );
		get_template_part( 'template-parts/framework/structure/list/list', '' );

		$html = ob_get_clean();

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

		// Create a multidimensional array like [2017] => [12], [2018] => [01, 02, 03] etc.
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
	 * Returns all years and months when there were posts published.
	 *
	 * Returns an array of objects like:
	 *  Array ( [0] => stdClass Object ( [post_date] => 2017-12-05 14:27:58 [post_status] => publish ) [1] => stdClass Object ( [post_date] => 2017-12-06 07:13:21 [post_status] => publish ) ...
	 *
	 * @return array An array of objects
	 */
	function log_lolla_pro_get_archive_list_by_year_and_months() {
		global $wpdb;

		$results = wp_cache_get( 'results--log_lolla_pro_get_archive_list_by_year_and_months' );

		if ( false === $results ) {
			$results = $wpdb->get_results(
				"SELECT `post_date`, `post_status` FROM $wpdb->posts WHERE `post_status` = 'publish' GROUP BY `post_date`",
				OBJECT
			);

			wp_cache_set( 'results--log_lolla_pro_get_archive_list_by_year_and_months', $results );
		}

		return $results;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_archive_object_for_date_archives' ) ) {
	/**
	 * Returns an object which helps generating archives for a date.
	 *
	 * @return object An archive object.
	 */
	function log_lolla_pro_get_archive_object_for_date_archives() {
		global $wp_query;

		$archive = new stdClass();
		$year    = $wp_query->query['year'];
		$month   = $wp_query->query['monthnum'];

		if ( empty( $year ) ) {
			return;
		}

		$archive->taxonomy = 'post_tag';

		if ( empty( $month ) ) {
			$archive->slug       = $year;
			$archive->date_query = array(
				array(
					'year' => $year,
				),
			);
		} else {
			$archive->slug       = $year . '-' . $month;
			$archive->date_query = array(
				array(
					'year'  => $year,
					'month' => $month,
				),
			);
		}

		return $archive;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_list_by_date' ) ) {
	/**
	 * Returns a list of posts belonging to a date.
	 *
	 * @param  object $archive The archive object.
	 * @return array           A list of posts.
	 */
	function log_lolla_pro_get_post_list_by_date( $archive ) {
		if ( empty( $archive ) ) {
			return;
		}

		$posts = get_posts(
			array(
				'post_type'   => 'post',
				'post_status' => 'publish',
				'numberposts' => -1,
				'date_query'  => $archive->date_query,
			)
		);

		return $posts;
	}
}
