<?php
/**
 * Template tags for custom post types
 *
 * Like sources, poeple, summaries etc.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( ! function_exists( 'log_lolla_pro_get_post_type_label' ) ) {
	/**
	 * Returns the label of a post type.
	 *
	 * @param  string $post_type The post type slug.
	 * @return string            The post type name.
	 */
	function log_lolla_pro_get_post_type_label( $post_type ) {
		if ( empty( $post_type ) ) {
			return;
		}

		$obj = get_post_type_object( $post_type );

		if ( isset( $obj->labels->name ) ) {
			return $obj->labels->name;
		} else {
			return '';
		}
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_type_person_displayed_as_thumb_html' ) ) {
	/**
	 * Returns the HTML of a post type Person displayed as a thumbnail.
	 *
	 * @param  string $name      The person name.
	 * @return string            The link to the post.
	 */
	function log_lolla_pro_get_post_type_person_displayed_as_thumb_html( $name ) {
		$html = '';

		$person = get_page_by_title( $name, OBJECT, 'people' );

		if ( ! empty( $person ) ) {
			$primary_text = the_title_attribute(
				array(
					'echo' => false,
					'post' => $person,
				)
			);

			$url        = get_permalink( $person );
			$avatar_url = 'yes';
			$avatar     = get_the_post_thumbnail( $person->ID, 'thumbnail' );

			if ( empty( $avatar ) ) {
				$src    = get_template_directory_uri() . '/assets/images/brutalist_line_SVGicon_author2-64x64';
				$avatar = '<img src="' . $src . '" alt="' . $primary_text . '">';
			}
		} else {
			$primary_text = $name;
			$url          = '';
			$avatar_url   = '';
			$src          = get_template_directory_uri() . '/assets/images/brutalist_line_SVGicon_author2-64x64';
			$avatar       = '<img src="' . $src . '" alt="' . $primary_text . '">';
		}

		ob_start();

		$list_item_query_vars = array(
			'klass'        => $post_type,
			'primary-text' => $primary_text,
			'avatar'       => $avatar,
			'url'          => $url,
			'avatar-url'   => $avatar_url,
		);
		set_query_var( 'list-item-query-vars', $list_item_query_vars );
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

			$list_item_query_vars = array(
				'klass'        => $post_type,
				'primary-text' => the_title_attribute(
					array(
						'echo' => false,
						'post' => $item->post,
					)
				),
				'avatar'       => get_the_post_thumbnail( $item->post->ID, 'thumbnail' ),
				'url'          => get_permalink( $item->post ),
				'avatar-url'   => 'yes',
				'metadata'     => $item->post_count,
			);
			set_query_var( 'list-item-query-vars', $list_item_query_vars );
			get_template_part( 'template-parts/framework/structure/list-item/list-item', '' );

			$html .= ob_get_clean();
		}

		$title  = log_lolla_pro_get_list_title( $title, $url, 'List of posts' );
		$object = get_post_type_object( $post_type );
		$label  = log_lolla_pro_convert_string_to_classname( $object->labels->name );

		ob_start();

		$list_query_vars = array(
			'klass' => 'post-list post-list--for-a-post-type',
			'title' => log_lolla_pro_get_list_title( $title, $url, 'List of posts' ),
			'items' => $html,
		);
		set_query_var( 'list-query-vars', $list_query_vars );
		get_template_part( 'template-parts/framework/structure/list/list', '' );

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
