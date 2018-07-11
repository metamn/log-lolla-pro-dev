<?php
/**
 * Template tags for custom post types
 *
 * Like sources, poeple, summaries etc.
 *
 * @package Log_Lolla_Pro
 */

if ( ! function_exists( 'log_lolla_pro_get_post_type_displayed_as_thumb_html' ) ) {
	/**
	 * Returns the HTML of a post type displayed as a thumbnail.
	 *
	 * @param  string $post_type The post type.
	 * @param  object $post      The post.
	 * @return string            The link to the post.
	 */
	function log_lolla_pro_get_post_type_displayed_as_thumb_html( $post_type, $post ) {
		$html = '';

		ob_start();
		set_query_var( 'list_item_class', $post_type );
		set_query_var( 'list_item_url', get_permalink( $post ) );
		set_query_var( 'list_item_avatar_url', 'yes' );

		set_query_var(
			'list_item_primary_text', the_title_attribute(
				array(
					'echo' => false,
					'post' => $post,
				)
			)
		);
		set_query_var( 'list_item_avatar', get_the_post_thumbnail( $post->ID, 'thumbnail' ) );

		get_template_part( 'template-parts/framework/structure/list-item/list-item', '' );

		$html .= ob_get_clean();

		return $html;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_type_post_list_popular_as_html' ) ) {
	/**
	 * Displays the most poular posts of a post type
	 *
	 * For example, the 5 most popular sources, or people
	 *
	 * @param  string  $post_type        The custom post type.
	 * @param  integer $number_of_items  How many posts to display.
	 * @param  string  $metadata         The metadata type, like `post count`, `sparkline`.
	 * @param  string  $title            The title of the post list.
	 * @param  string  $url              The link to the title of the post list.
	 * @return string                    HTML
	 */
	function log_lolla_pro_get_post_type_post_list_popular_as_html( $post_type, $number_of_items, $metadata = '', $title = '', $url = '' ) {
		$items = log_lolla_pro_get_post_type_post_list_popular( $post_type, $number_of_items, $metadata );

		if ( empty( $items ) ) {
			return;
		}

		$html = '';

		foreach ( $items as $item ) {
			ob_start();

			set_query_var( 'list_item_class', $post_type );
			set_query_var( 'list_item_url', get_permalink( $item->post ) );
			set_query_var( 'list_item_avatar_url', 'yes' );

			set_query_var(
				'list_item_primary_text', the_title_attribute(
					array(
						'echo' => false,
						'post' => $item->post,
					)
				)
			);
			set_query_var( 'list_item_secondary_text', '' );

			set_query_var( 'list_item_avatar', get_the_post_thumbnail( $item->post->ID, 'thumbnail' ) );
			set_query_var( 'list_item_metadata', $item->post_count );
			get_template_part( 'template-parts/framework/structure/list-item/list-item', '' );

			$html .= ob_get_clean();
		}

		$title = log_lolla_pro_get_list_title( $title, $url, 'List of posts' );

		ob_start();

		set_query_var( 'topic-list-klass', 'topic-list--' . $post_type );
		set_query_var( 'topic-list-title', $title );
		set_query_var( 'topic-list-items', $html );
		get_template_part( 'template-parts/topic/topic-list', '' );

		$html = ob_get_clean();

		return $html;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_type_post_list_popular' ) ) {
	/**
	 * Returns the most popular posts of a post type
	 *
	 * For example: the 5 most popular sources
	 *
	 * @param  string  $post_type       The custom post type ID.
	 * @param  integer $number_of_items How many posts to get.
	 * @return Array                     An array of posts with the post count.
	 */
	function log_lolla_pro_get_post_type_post_list_popular( $post_type, $number_of_items ) {
		if ( '0' === $number_of_items ) {
			return;
		}

		$all_of_pt = get_posts(
			array(
				'post_type'      => $post_type,
				'post_status'    => 'publish',
				'posts_per_page' => -1,
			)
		);

		if ( empty( $all_of_pt ) ) {
			return;
		}

		$posts_of_all_pts = [];

		foreach ( $all_of_pt as $pt ) {
			$posts_of_a_pt = log_lolla_pro_get_post_type_post_list( $pt );

			// Create a new object.
			$entry              = new stdClass();
			$entry->post        = $pt;
			$entry->post_count  = count( $posts_of_a_pt );
			$posts_of_all_pts[] = $entry;
		}

		// Sort posts.
		usort(
			$posts_of_all_pts, function( $a, $b ) {
				return ( $a->post_count < $b->post_count );
			}
		);

		// Return the first x items only.
		if ( $number_of_items > 0 ) {
			return array_slice( $posts_of_all_pts, 0, $number_of_items );
		} else {
			return $posts_of_all_pts;
		}
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_type_post_list' ) ) {
	/**
	 * Returns all posts of a post type
	 *
	 * By convention a post is tagged to mark it belongs to a certain post type
	 * For example:
	 *  - if the post is tagged 'Hacker News', and we have a 'Hacker News' source custom post type
	 *  - then the post belongs to the 'Hacker News' source
	 *
	 * @param  object $custom_post  A custom post.
	 * @return Array                An array of posts which are tagged with the $custom_post post title
	 */
	function log_lolla_pro_get_post_type_post_list( $custom_post ) {
		if ( empty( $custom_post ) ) {
			return;
		}

		return get_posts(
			array(
				'post_type'   => 'post',
				'post_status' => 'publish',
				'numberposts' => -1,
				'tax_query'   => array(
					array(
						'taxonomy' => 'post_tag',
						'field'    => 'slug',
						'terms'    => $custom_post->post_name,
					),
				),
			)
		);
	}
}
