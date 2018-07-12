<?php
/**
 * Standard Post format template tags
 *
 * @package Log_Lolla_Pro
 */

/**
 * Global variables.
 */
global $post_format_standard_tax_query;
$post_format_standard_tax_query = array(
	array(
		'taxonomy' => 'post_format',
		'field'    => 'slug',
		'terms'    => array(
			'post-format-aside',
			'post-format-audio',
			'post-format-chat',
			'post-format-gallery',
			'post-format-image',
			'post-format-link',
			'post-format-quote',
			'post-format-status',
			'post-format-video',
			'aside',
			'audio',
			'chat',
			'gallery',
			'image',
			'link',
			'quote',
			'status',
			'video',
		),
		'operator' => 'NOT IN',
	),
);

if ( ! function_exists( 'log_lolla_pro_get_post_format_standard_post_list' ) ) {
	/**
	 * Returns a list of posts of standard Post format.
	 *
	 * @return array           An array of posts.
	 */
	function log_lolla_pro_get_post_format_standard_post_list() {
		global $post_format_standard_tax_query;

		$posts = get_posts(
			array(
				'post_type'   => 'post',
				'post_status' => 'publish',
				'numberposts' => -1,
				'tax_query'   => $post_format_standard_tax_query,
			)
		);

		global $standard_posts_count;

		$standard_posts_count = count( $posts );

		return $posts;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_format_standard_post_list_for_date_archive' ) ) {
	/**
	 * Returns a list of posts of standard Post format for a date archive.
	 *
	 * @param  object $archive The archive object.
	 * @return array           An array of posts.
	 */
	function log_lolla_pro_get_post_format_standard_post_list_for_date_archive( $archive ) {
		if ( empty( $archive ) ) {
			return;
		}

		global $post_format_standard_tax_query;

		$posts = get_posts(
			array(
				'post_type'   => 'post',
				'post_status' => 'publish',
				'numberposts' => -1,
				'tax_query'   => $post_format_standard_tax_query,
				'date_query'  => $archive->date_query,
			)
		);

		global $standard_posts_count;

		$standard_posts_count = count( $posts );

		return $posts;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_format_standard_post_list_for_archive' ) ) {
	/**
	 * Returns a list of posts of standard Post format for an archive.
	 *
	 * Standard posts are tricky and buggy
	 * - Standard posts = all posts - non standard posts
	 *
	 * @param  object $archive The archive object.
	 * @return array           The posts
	 */
	function log_lolla_pro_get_post_format_standard_post_list_for_archive( $archive ) {
		if ( empty( $archive ) ) {
			return;
		}

		global $post_format_standard_tax_query;

		$posts = get_posts(
			array(
				'post_type'     => 'post',
				'post_status'   => 'publish',
				'numberposts'   => -1,
				'category_name' => $archive->slug,
				'tax_query'     => $post_format_standard_tax_query,
			)
		);

		global $standard_posts_count;

		$standard_posts_count = count( $posts );

		return $posts;
	}
}

if ( ! function_exists( 'log_lolla_pro_fix_post_format_list_with_post_count_for_standard_posts' ) ) {
	/**
	 * Returns all Post formats with count with the Standard post format post count manually fixed.
	 *
	 * There is no such term / taxonomy as `post-format-standard` like `post-format-quote`
	 * Therefore the post count for Standard posts is always 0
	 * Here we calculate manually Standard post counts by substracting all other post format counts from the count of total posts
	 *
	 * @param  Array $post_formats_with_count An array of objects.
	 * @return Array                          An array of objects
	 */
	function log_lolla_pro_fix_post_format_list_with_post_count_for_standard_posts( $post_formats_with_count ) {
		$total_number_of_posts = wp_count_posts()->publish;

		$total_number_of_posts_with_post_format = 0;

		foreach ( $post_formats_with_count as $post_format ) {
			$total_number_of_posts_with_post_format += $post_format->post_count;
		}

		foreach ( $post_formats_with_count as $post_format ) {
			if ( 'Standard' === $post_format->post_format_name ) {
				$post_format->post_count = $total_number_of_posts - $total_number_of_posts_with_post_format;
			}
		}

		return $post_formats_with_count;
	}
}
