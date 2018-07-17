<?php
/**
 * Summary template tags
 *
 * @link https://codex.wordpress.org/Template_Tags
 *
 * @package Log_Lolla_Pro
 */

if ( ! function_exists( 'log_lolla_pro_get_post_type_summary_post_list_for_the_summary' ) ) {
	/**
	 * Returns the list of posts based on a Summary was created.
	 *
	 * @param  object $summary The summary.
	 * @param  object $topic   The topic the Summary refers to.
	 * @return array           The list of posts.
	 */
	function log_lolla_pro_get_post_type_summary_post_list_for_the_summary( $summary, $topic ) {
		if ( empty( $summary ) ) {
			return;
		}

		if ( empty( $topic ) ) {
			return;
		}

		$dates = log_lolla_pro_get_summary_dates( $summary );

		if ( empty( $dates ) ) {
			return;
		}

		$taxonomy = ( 'category' === $topic->taxonomy ) ? 'category_name' : 'tag';

		$posts = get_posts(
			array(
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				$taxonomy        => $topic->slug,
				'date_query'     => array(
					array(
						'before' => $dates->to,
						'after'  => $dates->from,
					),
				),
			)
		);

		return $posts;
	}
}

if ( ! function_exists( 'log_lolla_pro_display_summary_dates_prefix' ) ) {
	/**
	 * Display the prefix for the dates of a summary
	 *
	 * @param  Object $summary The summary.
	 * @return string          HTML
	 */
	function log_lolla_pro_display_summary_dates_prefix( $summary ) {
		if ( empty( $summary ) ) {
			return;
		}

		$dates = log_lolla_pro_get_summary_dates( $summary );

		if ( empty( $dates ) ) {
			return;
		}

		if ( ! empty( $dates->from ) ) {
			printf(
				'<span class="date-prefix">%1$s</span>',
				/* translators: The date prefix for the Summary post format. */
				esc_html_x( 'Between&nbsp;', 'The date prefix for the Summary post format', 'log-lolla-pro' )
			);
		} else {
			printf(
				'<span class="date-prefix">%1$s</span>',
				/* translators: The date prefix for the Summary post format. */
				esc_html_x( 'Until&nbsp;', 'he date prefix for the Summary post format', 'log-lolla-pro' )
			);
		}
	}
}

if ( ! function_exists( 'log_lolla_pro_display_summary_dates' ) ) {
	/**
	 * Display the dates for a summary
	 *
	 * @param  Object $summary The summary.
	 * @return string          HTML
	 */
	function log_lolla_pro_display_summary_dates( $summary ) {
		if ( empty( $summary ) ) {
			return;
		}

		$dates = log_lolla_pro_get_summary_dates( $summary );

		if ( empty( $dates ) ) {
			return;
		}

		if ( ! empty( $dates->from ) ) {
			printf(
				'<time class="date published" datetime="%1$s">%2$s</time>',
				esc_attr( $dates->from ),
				esc_html( $dates->from )
			);

			printf(
				'<span class="dates-separator">%1$s</span><time class="date published" datetime="%2$s">%3$s</time>',
				esc_html( '&nbsp;&mdash;&nbsp;', 'log-lolla-pro' ),
				esc_attr( $dates->to ),
				esc_html( $dates->to )
			);
		} else {
			printf(
				'<time class="date published" datetime="%1$s">%2$s</time>',
				esc_attr( $dates->to ),
				esc_html( $dates->to )
			);
		}
	}
}

if ( ! function_exists( 'log_lolla_pro_get_summary_dates' ) ) {
	/**
	 * Get the dates for a summary
	 *
	 * @param  Object $summary The summary.
	 * @return Object          The dates
	 */
	function log_lolla_pro_get_summary_dates( $summary ) {
		if ( empty( $summary ) ) {
			return;
		}

		$dates     = new stdClass();
		$dates->to = get_the_date( 'F j, Y', $summary );

		$topic = log_lolla_pro_get_post_type_summary_topic( $summary );

		if ( empty( $topic ) ) {
			return;
		}

		$summaries_for_topic = log_lolla_pro_get_post_type_summary_post_list_for_archive( $topic );

		if ( empty( $summaries_for_topic ) ) {
			return;
		}

		foreach ( $summaries_for_topic as $summary_for_topic ) {
			if ( $summary_for_topic->post_date < $summary->post_date ) {
				$dates->from = get_the_date( 'F j, Y', $summary_for_topic );
				break;
			}
		}

		return $dates;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_type_summary_topic' ) ) {
	/**
	 * Returns the topic of a summary.
	 *
	 * The topic is either the first category, or the first tag.
	 *
	 * @param  Object $summary The summary.
	 * @return Object          The topic
	 */
	function log_lolla_pro_get_post_type_summary_topic( $summary ) {
		if ( empty( $summary ) ) {
			return;
		}

		$categories = get_the_category( $summary->ID );

		if ( ! empty( $categories[0] ) ) {
			return $categories[0];
		}

		$tags = get_the_terms( $summary->ID, 'post_tag' );

		if ( ! empty( $tags[0] ) ) {
			return $tags[0];
		}
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_type_summary_post_list_for_archive' ) ) {
	/**
	 * Returns a list of summaries for an archive
	 *
	 * @param  Object $archive The archive.
	 * @return Array           The list of posts
	 */
	function log_lolla_pro_get_post_type_summary_post_list_for_archive( $archive ) {
		if ( empty( $archive ) ) {
			return;
		}

		// The only taxonomy supported by Summaries are categories and tags.
		// - this below makes possible to have summaries for Post formats.
		if ( 'post_format' === $archive->taxonomy ) {
			$archive->taxonomy = 'post_tag';
		}

		$posts = get_posts(
			array(
				'post_type'      => 'summary',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'order'          => 'ASC',
				'tax_query'      => array(
					array(
						'taxonomy' => $archive->taxonomy,
						'field'    => 'slug',
						'terms'    => $archive->slug,
					),
				),
			)
		);

		global $summaries_count;
		$summaries_count = count( $posts );

		return $posts;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_type_summary_post_list_as_html' ) ) {
	/**
	 * Returns a list of summaries as HTML.
	 *
	 * @param  string $number_of_summaries The number of summaries to get.
	 * @param  string $title               The title of the post list.
	 * @param  string $url                 The link to the title of the post list.
	 * @return string                      HTML
	 */
	function log_lolla_pro_get_post_type_summary_post_list_as_html( $number_of_summaries, $title = '', $url = '' ) {
		$summaries = log_lolla_pro_get_post_type_summary_post_list( $number_of_summaries );

		if ( empty( $summaries ) ) {
			return;
		}

		$title = log_lolla_pro_get_list_title( $title, $url, 'List of posts' );
		$html  = '';

		ob_start();

		set_query_var( 'post-list-klass', 'summaries' );
		set_query_var( 'post-list-title', $title );
		set_query_var( 'post-list-posts', $summaries );
		get_template_part( 'template-parts/post/post-list', '' );

		$html .= ob_get_clean();

		return $html;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_type_summary_post_list' ) ) {
	/**
	 * Returns a list of posts of the Summary Post type.
	 *
	 * @param  integer $number_of_summaries The number of posts to display.
	 * @return array                        An array of posts.
	 */
	function log_lolla_pro_get_post_type_summary_post_list( $number_of_summaries ) {
		return get_posts(
			array(
				'post_type'      => 'summary',
				'post_status'    => 'publish',
				'posts_per_page' => $number_of_summaries,
				'order'          => 'ASC',
			)
		);
	}
}
