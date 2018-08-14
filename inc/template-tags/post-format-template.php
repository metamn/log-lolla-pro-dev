<?php
/**
 * Post formats template tags
 *
 * @link https://codex.wordpress.org/Template_Tags
 *
 * @package Log_Lolla_Pro
 */

if ( ! function_exists( 'log_lolla_pro_get_post_format_label' ) ) {
	/**
	 * Returns the label of a post format.
	 *
	 * @param  string $post_format The post format name.
	 * @return string              The translated post format name.
	 */
	function log_lolla_pro_get_post_format_label( $post_format ) {
		if ( empty( $post_format ) ) {
			return;
		}

		switch ( $post_format ) {
			case 'Post Formats':
				/* translators: The Post Formats name */
				return esc_html__( 'Post Formats', 'log-lolla-pro' );
			case 'Standard':
				/* translators: The Standard Post Format name */
				return esc_html__( 'Standard', 'log-lolla-pro' );
			default:
				return '';
		}
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_format_link_class' ) ) {
	/**
	 * Returns a class for the link post format
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
	 * Returns the link to the Post format archive
	 *
	 * @param  string $post_format The name of the Post format.
	 * @return string              The url
	 */
	function log_lolla_pro_get_post_format_link_to_archive( $post_format ) {
		if ( 'Standard' === $post_format ) {
			return home_url( '/' ) . 'post-format/standard';
		} else {
			return get_post_format_link( $post_format );
		}
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_format_link_to_archive_as_html' ) ) {
	/**
	 * Returns the link to the Post format archive, as HTML
	 *
	 * @param string $format The post format.
	 * @return string HTML
	 */
	function log_lolla_pro_get_post_format_link_to_archive_as_html( $format = null ) {
		if ( empty( $format ) ) {
			$format = get_post_format() ? : 'Standard';
		}

		$html = '';

		if ( 'Standard' === $format ) {
			$html = log_lolla_pro_get_link_html( 'Post Format Standard' );
		} else {

			ob_start();

			set_query_var( 'link-url', get_post_format_link( $format ) );
			set_query_var( 'link-title', ucfirst( $format ) );
			set_query_var( 'link-content', ucfirst( $format ) );
			set_query_var( 'link-klass', 'topic-link' );
			get_template_part( 'template-parts/framework/design/typography/elements/link/link', '' );

			$html = ob_get_clean();
		}

		return $html;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_format_list_with_post_count_as_html' ) ) {
	/**
	 * Returns the whole list of Post formats with post count, as HTML
	 *
	 * @param  string $title The title of the post list.
	 * @param  string $url   The link to the title of the post list.
	 * @return string        HTML
	 */
	function log_lolla_pro_get_post_format_list_with_post_count_as_html( $title = '', $url = '' ) {
		$post_formats = log_lolla_pro_get_post_format_list_with_post_count();

		if ( empty( $post_formats ) ) {
			return;
		}

		$items = '';

		foreach ( $post_formats as $post_format ) {
			$items .= log_lolla_pro_get_post_format_with_post_count_as_html( $post_format );
		}

		$html = '';

		ob_start();

		$list_query_vars = array(
			'klass' => 'topic-list topic-list--post-formats',
			'title' => log_lolla_pro_get_list_title( $title, $url, 'List of post formats' ),
			'items' => $items,
		);
		set_query_var( 'list-query-vars', $list_query_vars );
		get_template_part( 'template-parts/framework/structure/list/list', '' );

		$html .= ob_get_clean();

		return $html;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_format_list_with_post_count' ) ) {
	/**
	 * Returns all Post formats with post count
	 *
	 * @return Array An array of objects with post format and post count
	 */
	function log_lolla_pro_get_post_format_list_with_post_count() {
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

		return log_lolla_pro_fix_post_format_list_with_post_count_for_standard_posts( $post_formats_with_count );
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_format_with_post_count_as_html' ) ) {
	/**
	 * Returns a Post format with post count, as HTML
	 *
	 * @param  object $item The post format object with count.
	 * @return string       HTML
	 */
	function log_lolla_pro_get_post_format_with_post_count_as_html( $item ) {
		if ( empty( $item ) ) {
			return;
		}

		$html = '';

		ob_start();
		set_query_var( 'list_item_class', 'post-format' );
		set_query_var( 'list_item_url', log_lolla_pro_get_post_format_link_to_archive( $item->post_format_name ) );
		set_query_var( 'list_item_primary_text', $item->post_format_name );
		set_query_var( 'list_item_metadata', $item->post_count );

		get_template_part( 'template-parts/framework/structure/list-item/list-item', '' );

		$html .= ob_get_clean();

		return $html;
	}
}
