<?php
/**
 * Post formats template tags
 *
 * @link https://codex.wordpress.org/Template_Tags
 *
 * @package Log_Lolla_Pro
 */


if ( ! function_exists( 'log_lolla_pro_get_post_format_link_class' ) ) {
	/**
	 * Return a class for the link post format
	 *
	 * @param string $url The url of the post.
	 * @return string
	 */
	function log_lolla_pro_get_post_format_link_class( $url ) {
		return log_lolla_pro_post_link_is_external( $url ) ? 'local-link' : 'external-link';
	}
}


if ( ! function_exists( 'log_lolla_pro_get_post_format_link_title' ) ) {
	/**
	 * Returns link title for the Link Post format
	 *
	 * @param string $url The url of the post.
	 * @return string     Either the post title, or the $url where it points
	 */
	function log_lolla_pro_get_post_format_link_title( $url ) {
		$has_title = the_title_attribute( 'echo=0' );

		return ( ! empty( $has_title ) ) ? $has_title : $url;
	}
}


if ( ! function_exists( 'log_lolla_pro_get_post_format_link_to_archive' ) ) {
	/**
	 * Get the link to the Post format archive
	 *
	 * @return string HTML
	 */
	function log_lolla_pro_get_post_format_link_to_archive() {
		$format = get_post_format() ? : 'standard';

		$html = '';

		ob_start();
		set_query_var( 'post_format_name', $format );
		get_template_part( 'template-parts/post/parts/post-format', 'name-with-link' );

		$html .= ob_get_clean();

		return $html;
	}
}



if ( ! function_exists( 'log_lolla_pro_get_post_format_standard_post_list_for_archive' ) ) {
	/**
	 * Get a list of posts of standard Post format for an archive.
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

		return get_posts(
			array(
				'post_type'     => 'post',
				'post_status'   => 'publish',
				'numberposts'   => -1,
				'category_name' => $archive->slug,
				'tax_query'     => array(
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
				),
			)
		);
	}
}


if ( ! function_exists( 'log_lolla_pro_display_post_formats_with_post_count' ) ) {
	/**
	 * Display post formats with post count
	 *
	 * @return string HTML
	 */
	function log_lolla_pro_display_post_formats_with_post_count() {
		$post_formats = log_lolla_pro_get_post_formats_with_post_count();

		if ( empty( $post_formats ) ) {
			return;
		}

		$html = '';

		foreach ( $post_formats as $post_format ) {
			$html .= log_lolla_pro_display_post_format_with_post_count( $post_format );
		}

		return $html;
	}
}



if ( ! function_exists( 'log_lolla_pro_display_post_format_with_post_count' ) ) {
	/**
	 * Display post format with post count
	 *
	 * @param  object $item The post format object with count.
	 * @return string       HTML
	 */
	function log_lolla_pro_display_post_format_with_post_count( $item ) {
		if ( empty( $item ) ) {
			return;
		}

		$html = '';

		ob_start();
		set_query_var( 'list_item_class', 'post-format' );
		set_query_var( 'list_item_url', get_post_format_link( $item->post_format_name ) );

		set_query_var( 'list_item_primary_text', $item->post_format_name );
		set_query_var( 'list_item_metadata', $item->post_count );

		get_template_part( 'template-parts/framework/structure/list-item/list-item', '' );

		$html .= ob_get_clean();

		return $html;
	}
}




if ( ! function_exists( 'log_lolla_pro_get_post_formats_with_post_count' ) ) {
	/**
	 * Get post formats with post count
	 *
	 * @return Array An array of objects with post format and post count
	 */
	function log_lolla_pro_get_post_formats_with_post_count() {
		$post_formats_list = get_post_format_strings();

		if ( empty( $post_formats_list ) ) {
			return;
		}

		$post_formats_with_count = [];

		foreach ( $post_formats_list as $post_format ) {
			$posts = get_posts(
				array(
					'post_type'   => 'post',
					'post_status' => 'publish',
					'numberposts' => -1,
					'tax_query'   => array(
						array(
							'taxonomy' => 'post_format',
							'field'    => 'slug',
							'terms'    => array(
								// It seems WP has two entries for a single post format: 'post-format-quote' and 'quote'
								// - https://imgur.com/a/RoysD
								// - this is an error / bug because if we have a Quote tag then it will be taken as a post format
								// - however this query is working fine, the count was manually verified.
								'post-format-' . strtolower( $post_format ),
								strtolower( $post_format ),
							),
						),
					),
				)
			);

			$obj                   = new stdClass();
			$obj->post_format_name = $post_format;
			$obj->post_count       = count( $posts );

			$post_formats_with_count[] = $obj;
		}

		return log_lolla_pro_get_post_formats_with_post_count_for_standard_posts( $post_formats_with_count );
	}
}


if ( ! function_exists( 'log_lolla_pro_get_post_formats_with_post_count_for_standard_posts' ) ) {
	/**
	 * Fix post format Standard post count
	 *
	 * There is no such term / taxonomy as `post-format-standard` like `post-format-quote`
	 * Therefore the post count for Standard posts is always 0
	 * Here we calculate manually Standard post counts by substracting all other post format counts from the count of total posts
	 *
	 * @param  Array $post_formats_with_count An array of objects.
	 * @return Array                          An array of objects
	 */
	function log_lolla_pro_get_post_formats_with_post_count_for_standard_posts( $post_formats_with_count ) {
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
