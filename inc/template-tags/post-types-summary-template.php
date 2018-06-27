<?php
/**
 * Summary template tags
 *
 * @link https://codex.wordpress.org/Template_Tags
 *
 * @package Log_Lolla_Pro
 */

if ( ! function_exists( 'log_lolla_pro_get_post_type_summary_link_to_topic' ) ) {
	/**
	 * Get a link to the topic for a Summary Post type
	 *
	 * @param  Object $summary The summary.
	 * @return string          HTML
	 */
	function log_lolla_pro_get_post_type_summary_link_to_topic( $summary ) {
		if ( empty( $summary ) ) {
			return;
		}

		$topic = log_lolla_pro_get_post_type_summary_topic( $summary );
		if ( empty( $topic ) ) {
			return;
		}

		$html = '';

		ob_start();
		set_query_var( 'topic', $topic );
		get_template_part( 'template-parts/topic/topic', 'with-prefix' );
		$html .= ob_get_clean();

		return $html;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_type_summary_topic' ) ) {
	/**
	 * Get the topic of a summary
	 *
	 * @param  Object $summary The summary.
	 * @return Object          The topic
	 */
	function log_lolla_pro_get_post_type_summary_topic( $summary ) {
		if ( empty( $summary ) ) {
			return;
		}

		$categories = get_the_category( $summary->ID );
		if ( empty( $categories[0] ) ) {
			return;
		}

		return $categories[0];
	}
}

if ( ! function_exists( 'log_lolla_pro_display_post_type_summary_post_list' ) ) {
	/**
	 * Display a list of posts of the Summary Post type.
	 *
	 * @param  integer $number_of_summaries The number of posts to display.
	 * @return string                       HTML
	 */
	function log_lolla_pro_display_post_type_summary_post_list( $number_of_summaries ) {
		$summaries = get_posts(
			array(
				'post_type'      => 'summary',
				'post_status'    => 'publish',
				'posts_per_page' => $number_of_summaries,
				'order'          => 'ASC',
			)
		);

		if ( empty( $summaries ) ) {
			return;
		}

		$html = '';

		global $post;
		ob_start();
		foreach ( $summaries as $post ) {
			setup_postdata( $post );
			// removed by cs
			// get_template_part( 'template-parts/summary/summary', '' ).
		}
		wp_reset_postdata();
		$html .= ob_get_clean();

		return $html;
	}
}
