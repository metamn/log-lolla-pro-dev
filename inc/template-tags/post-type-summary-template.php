<?php
/**
 * Summary template tags
 *
 * @link https://codex.wordpress.org/Template_Tags
 *
 * @package Log_Lolla_Pro
 */

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
	 * @return string                      HTML
	 */
	function log_lolla_pro_get_post_type_summary_post_list_as_html( $number_of_summaries ) {
		$summaries = log_lolla_pro_get_post_type_summary_post_list( $number_of_summaries );

		if ( empty( $summaries ) ) {
			return;
		}

		$html = '';

		global $post;
		ob_start();

		foreach ( $summaries as $post ) {
			setup_postdata( $post );
			get_template_part( 'template-parts/post/post-format', 'summary' );
		}

		wp_reset_postdata();
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
