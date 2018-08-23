<?php
/**
 * Topics template tags
 *
 * @link https://codex.wordpress.org/Template_Tags
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( ! function_exists( 'log_lolla_pro_get_topic_label' ) ) {
	/**
	 * Returns the label of a topic.
	 *
	 * @param  string $topic_type The topic name.
	 * @return string             The translated topic name.
	 */
	function log_lolla_pro_get_topic_label( $topic_type ) {
		if ( empty( $topic_type ) ) {
			return;
		}

		switch ( $topic_type ) {
			case 'Topics':
				/* translators: The Topics name */
				return esc_html__( 'Topics', 'log-lolla-pro' );
			case 'Topics Summary':
				/* translators: The Topics Summary name */
				return esc_html__( 'Topics Summary', 'log-lolla-pro' );
			case 'Related topics':
				/* translators: The Related topics name */
				return esc_html__( 'Related topics', 'log-lolla-pro' );
			case 'Categories':
				/* translators: The Categories name */
				return esc_html__( 'Categories', 'log-lolla-pro' );
			case 'Tags':
				/* translators: The Tags name */
				return esc_html__( 'Tags', 'log-lolla-pro' );
			default:
				return '';
		}
	}
}

if ( ! function_exists( 'log_lolla_pro_get_topic_list_summary' ) ) {
	/**
	 * Returns topics summary
	 *
	 * Displays a text / paragraph containing all the category and tag descriptions merged together
	 *
	 * The $number_of_categories and $number_of_tags works like:
	 * - -1: display all
	 * - 0: display none
	 *
	 * @link https://developer.wordpress.org/reference/classes/wp_term_query/__construct/
	 *
	 * @param  integer $number_of_categories How many categories to show.
	 * @param  integer $number_of_tags       How many tags to show.
	 * @return string                        HTML
	 */
	function log_lolla_pro_get_topic_list_summary( $number_of_categories = 0, $number_of_tags = 0 ) {
		if ( '0' === $number_of_categories ) {
			$categories = [];
		} elseif ( '-1' === $number_of_categories ) {
			$categories = log_lolla_pro_get_topic_list_most_popular_by_post_count( 'category', 0 );
		} else {
			$categories = log_lolla_pro_get_topic_list_most_popular_by_post_count( 'category', $number_of_categories );
		}

		if ( '0' === $number_of_tags ) {
			$tags = [];
		} elseif ( '-1' === $number_of_tags ) {
			$tags = log_lolla_pro_get_topic_list_most_popular_by_post_count( 'post_tag', 0 );
		} else {
			$tags = log_lolla_pro_get_topic_list_most_popular_by_post_count( 'post_tag', $number_of_tags );
		}

		if ( empty( $categories ) && empty( $tags ) ) {
			return;
		}

		$categories_descriptions = array_filter(
			array_map(
				function( $term ) {
					return strtolower( log_lolla_pro_get_term_description( $term->term_id, 'category' ) );
				},
				$categories
			)
		);

		$tags_descriptions = array_filter(
			array_map(
				function( $term ) {
					return strtolower( log_lolla_pro_get_term_description( $term->term_id, 'post_tag' ) );
				},
				$tags
			)
		);

		if ( empty( $categories_descriptions ) && empty( $tags_descriptions ) ) {
			return;
		}

		$sentence = log_lolla_pro_create_sentence_from_arrays( $categories_descriptions, $tags_descriptions );

		return $sentence;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_topic_post_list_as_html' ) ) {
	/**
	 * Returns the list of posts for a topic as HTML
	 *
	 * @param  string $topic The type of a topic like 'category', 'post_tag'.
	 * @return string        HTML
	 */
	function log_lolla_pro_get_topic_post_list_as_html( $topic ) {
		$terms = log_lolla_pro_get_topic_list_most_popular_by_post_count( $topic, 0 );

		if ( empty( $terms ) ) {
			return;
		}

		$html = '';

		ob_start();
		foreach ( $terms as $term ) {
			set_query_var( 'topic', $term );
			get_template_part( 'template-parts/topic/topic', '' );
		}
		$html .= ob_get_clean();

		return $html;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_topic_post_list_related_to_archive_as_html' ) ) {
	/**
	 * Returns related topics for an archive as HTML
	 *
	 * @param  object $archive The archive object.
	 * @return string          HTML.
	 */
	function log_lolla_pro_get_topic_post_list_related_to_archive_as_html( $archive ) {
		if ( empty( $archive ) ) {
			return;
		}

		$related_topics = log_lolla_pro_get_topic_post_list_related_to_archive( $archive );

		if ( empty( $related_topics ) ) {
			return;
		}

		global $related_topics_count;
		$related_topics_count = count( $related_topics );

		$html = '';

		ob_start();
		foreach ( $related_topics as $topic ) {
			set_query_var( 'topic', $topic );
			get_template_part( 'template-parts/topic/topic', '' );
		}
		$html .= ob_get_clean();

		return $html;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_topic_post_list_related_to_archive' ) ) {
	/**
	 * Returns the data for the related topics of an archive
	 *
	 * @param  object $archive The Archive object.
	 * @return array           An array of topics.
	 */
	function log_lolla_pro_get_topic_post_list_related_to_archive( $archive ) {
		if ( empty( $archive ) ) {
			return;
		}

		if ( empty( $archive->date_query ) ) {
			$posts_for_archive = log_lolla_pro_get_topic_post_list( $archive );
		} else {
			$posts_for_archive = log_lolla_pro_get_post_list_by_date( $archive );
		}

		if ( empty( $posts_for_archive ) ) {
			return;
		}

		$related_topics = [];

		foreach ( $posts_for_archive as $post ) {
			$categories = get_the_terms( $post->ID, 'category' );

			if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) {
				$related_topics = array_merge( $related_topics, $categories );
			}

			$tags = get_the_terms( $post->ID, 'post_tag' );

			if ( ! is_wp_error( $tags ) && ! empty( $tags ) ) {
				$related_topics = array_merge( $related_topics, $tags );
			}
		}

		$related_topics = array_unique( $related_topics, SORT_REGULAR );

		return log_lolla_pro_remove_object_from_array_by_key( $related_topics, $archive->term_id, 'term_id' );
	}
}

if ( ! function_exists( 'log_lolla_pro_get_topic_list_with_sparklines_as_html' ) ) {
	/**
	 * Returns topics (categories and tags) using sparklines, as HTML
	 *
	 * @param  integer $sparklines           Number of sparklines. See @link https://github.com/aftertheflood/sparks.
	 * @param  integer $number_of_categories How many categories to show.
	 * @param  integer $number_of_tags       How many tags to show.
	 * @param  string  $title               The title of the post list.
	 * @param  string  $url                 The link to the title of the post list.
	 * @return string                        HTML.
	 */
	function log_lolla_pro_get_topic_list_with_sparklines_as_html( $sparklines = 10, $number_of_categories = 0, $number_of_tags = 0, $title = '', $url = '' ) {
		// Get most popular categories.
		if ( '0' === $number_of_categories ) {
			$categories = [];
		} elseif ( '-1' === $number_of_categories ) {
			$categories = log_lolla_pro_get_topic_list_most_popular_by_post_count( 'category', 0 );
		} else {
			$categories = log_lolla_pro_get_topic_list_most_popular_by_post_count( 'category', $number_of_categories );
		}

		// .... and tags.
		if ( '0' === $number_of_tags ) {
			$tags = [];
		} elseif ( '-1' === $number_of_tags ) {
			$tags = log_lolla_pro_get_topic_list_most_popular_by_post_count( 'post_tag', 0 );
		} else {
			$tags = log_lolla_pro_get_topic_list_most_popular_by_post_count( 'post_tag', $number_of_tags );
		}

		if ( empty( $categories ) && empty( $tags ) ) {
			return;
		}

		// Get an array of dates for each sparkline.
		$sparkline_dates = log_lolla_pro_get_sparkline_dates( $sparklines );

		if ( empty( $sparkline_dates ) ) {
			return;
		}

		$items = '';

		foreach ( $categories as $category ) {
			$items .= log_lolla_pro_get_topic_with_sparklines_as_html( 'category', $category, $sparkline_dates );
		}

		foreach ( $tags as $tag ) {
			$items .= log_lolla_pro_get_topic_with_sparklines_as_html( 'tag', $tag, $sparkline_dates );
		}

		$html = '';

		ob_start();

		$list_query_vars = array(
			'klass' => 'topic-list topic-list--with-sparklines',
			'title' => log_lolla_pro_get_list_title( $title, $url, 'List of posts' ),
			'items' => $items,
		);
		set_query_var( 'list-query-vars', $list_query_vars );
		get_template_part( 'template-parts/framework/structure/list/list', '' );

		$html .= ob_get_clean();

		return $html;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_topic_with_sparklines_as_html' ) ) {
	/**
	 * Returns a topic (category or tag) with sparklines, as HTML
	 *
	 * @param  string $item_class_name The item class name.
	 * @param  Object $item            The item.
	 * @param  Object $sparkline_dates The sparkline dates array.
	 * @return string                  HTML
	 */
	function log_lolla_pro_get_topic_with_sparklines_as_html( $item_class_name, $item, $sparkline_dates ) {
		if ( empty( $item ) ) {
			return;
		}
		if ( empty( $sparkline_dates ) ) {
			return;
		}

		$html = '';

		ob_start();
		set_query_var( 'sparklines', log_lolla_pro_get_sparklines_for_topic_as_html( $sparkline_dates, $item ) );
		get_template_part( 'template-parts/sparklines/sparklines', '' );
		$list_item_metadata = ob_get_clean();

		ob_start();

		$list_item_query_vars = array(
			'klass'        => $item_class_name,
			'primary-text' => $item->name,
			'metadata'     => $list_item_metadata,
			'url'          => get_term_link( $item ),
		);
		set_query_var( 'list-item-query-vars', $list_item_query_vars );
		get_template_part( 'template-parts/framework/structure/list-item/list-item', '' );

		$html .= ob_get_clean();

		return $html;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_topic_list_most_popular_by_post_count' ) ) {
	/**
	 * Returns most popular terms by the count of posts they belong to
	 *
	 * @link https://developer.wordpress.org/reference/classes/wp_term_query/__construct/
	 *
	 * Returns something like:
	 *  Array ( [0] => WP_Term Object ( [term_id] => 2 [name] => Emerging [slug] => emerging [term_group] => 0 [term_taxonomy_id] => 2 [taxonomy] => category [description] => [parent] => 0 [count] => 41 [filter] => raw ) [1] => WP_Term Object ( [term_id] => 7 [name] => Wordpress Themes [slug] => wordpress-themes
	 *
	 * @param  string  $taxonomy The taxonomy id like 'category', 'post_tag'.
	 * @param  integer $how_many How many terms to get. Accepts 0 (all) or any positive number. Default 0 (all).
	 * @return array             An array of term objects.
	 */
	function log_lolla_pro_get_topic_list_most_popular_by_post_count( $taxonomy, $how_many ) {
		return get_terms(
			array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => true,
				'orderby'    => 'count',
				'order'      => 'DESC',
				'number'     => $how_many,
			)
		);
	}
}

if ( ! function_exists( 'log_lolla_pro_get_term_description' ) ) {
	/**
	 *
	 * Returns a term description.
	 *
	 * Cleans up the `term-description` WordPress function which:
	 * - It wraps the result in `<p>` tags
	 * - It contains null strings
	 *
	 * @param  integer $term_id  The term id.
	 * @param  string  $taxonomy The term's taxonomy.
	 * @return string            The cleaned up term description
	 */
	function log_lolla_pro_get_term_description( $term_id, $taxonomy ) {
		return trim( strip_tags( term_description( $term_id, $taxonomy ) ) );
	}
}

if ( ! function_exists( 'log_lolla_pro_get_topic_post_list' ) ) {
	/**
	 * Returns all posts of a topic.
	 *
	 * @param  object $topic The topic.
	 * @return Array         An array of posts
	 */
	function log_lolla_pro_get_topic_post_list( $topic ) {
		if ( empty( $topic ) ) {
			return;
		}

		switch ( true ) {
			case ( 'post-format-standard' === $topic->post_name ):
				$posts = log_lolla_pro_get_post_format_standard_post_list();
				return $posts;
			case ( false !== strpos( $topic->slug, 'post-format' ) ):
				$taxonomy = 'post_format';
				break;
			default:
				$taxonomy = is_category( $topic ) ? 'category_name' : 'tag';
				break;
		}

		$posts = get_posts(
			array(
				'post_type'   => 'post',
				'post_status' => 'publish',
				'numberposts' => -1,
				$taxonomy     => $topic->slug,
			)
		);

		return $posts;
	}
}
