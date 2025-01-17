<?php
/**
 * Custom shortcodes
 *
 * @link https://codex.wordpress.org/Shortcode_API
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( ! function_exists( 'log_lolla_pro_create_custom_shortcode_topics_summary' ) ) {
	/**
	 * Display topics summary
	 *
	 * Usage: [log-lolla-pro-topics-summary categories="5" tags="3"]
	 *
	 * Displays a text / paragraph containing all the category and tag descriptions merged together
	 *
	 * @link https://github.com/metamn/log-lolla-pro-dev/issues/15
	 *
	 * @param  Array $attributes The attributes of the shortcode.
	 * @return string            HTML
	 */
	function log_lolla_pro_create_custom_shortcode_topics_summary( $attributes ) {
		// Default attributes.
		$default_attributes = array(
			'categories' => 5,
			'tags'       => 5,
		);

		// Parse attributes.
		$attrs = shortcode_atts( $default_attributes, $attributes );

		// Content.
		$content = log_lolla_pro_get_topic_list_summary( $attrs['categories'], $attrs['tags'] );

		// Title.
		$title = log_lolla_pro_get_topic_label( 'Topics Summary' );

		return log_lolla_pro_display_shortcode( $title, $content );
	}

	add_shortcode( 'log-lolla-pro-topics-summary', 'log_lolla_pro_create_custom_shortcode_topics_summary' );
}

if ( ! function_exists( 'log_lolla_pro_create_custom_shortcode_summaries' ) ) {
	/**
	 * Display summaries archive
	 *
	 * Usage: [log-lolla-pro-summaries summaries="5"]
	 *
	 * @param  Array $attributes The attributes of the shortcode.
	 * @return string            HTML
	 */
	function log_lolla_pro_create_custom_shortcode_summaries( $attributes ) {
		// Default attributes.
		$default_attributes = array(
			'summaries' => 5,
		);

		// Parse attributes.
		$attrs = shortcode_atts( $default_attributes, $attributes );

		return wp_kses_post(
			log_lolla_pro_get_post_type_summary_post_list_as_html(
				$attrs['summaries'],
				log_lolla_pro_get_post_type_label( 'summary' ),
				log_lolla_pro_get_link( 'Summaries' )
			)
		);
	}

	add_shortcode( 'log-lolla-pro-summaries', 'log_lolla_pro_create_custom_shortcode_summaries' );
}

if ( ! function_exists( 'log_lolla_pro_create_custom_shortcode_post_formats' ) ) {
	/**
	 * Display post formats archive
	 *
	 * Usage: [log-lolla-pro-post-formats]
	 *
	 * @param  Array $attributes The attributes of the shortcode.
	 * @return string            HTML
	 */
	function log_lolla_pro_create_custom_shortcode_post_formats( $attributes ) {
		// Default attributes.
		$default_attributes = array();

		// Parse attributes.
		$attrs = shortcode_atts( $default_attributes, $attributes );

		return wp_kses_post(
			log_lolla_pro_get_post_format_list_with_post_count_as_html(
				log_lolla_pro_get_post_format_label( 'Post Formats' ),
				log_lolla_pro_get_link( 'Post Formats' )
			)
		);
	}

	add_shortcode( 'log-lolla-pro-post-formats', 'log_lolla_pro_create_custom_shortcode_post_formats' );
}

if ( ! function_exists( 'log_lolla_pro_create_custom_shortcode_sources' ) ) {
	/**
	 * Display sources archive
	 *
	 * Usage: [log-lolla-pro-sources sources="5"]
	 *
	 * @param  Array $attributes The attributes of the shortcode.
	 * @return string            HTML
	 */
	function log_lolla_pro_create_custom_shortcode_sources( $attributes ) {
		// Default attributes.
		$default_attributes = array(
			'sources' => 5,
		);

		// Parse attributes.
		$attrs = shortcode_atts( $default_attributes, $attributes );

		return wp_kses_post(
			log_lolla_pro_get_post_type_post_list_popular_as_html(
				'source',
				$attrs['sources'],
				'post count',
				log_lolla_pro_get_post_type_label( 'source' ),
				log_lolla_pro_get_link( 'Sources' )
			)
		);
	}

	add_shortcode( 'log-lolla-pro-sources', 'log_lolla_pro_create_custom_shortcode_sources' );
}

if ( ! function_exists( 'log_lolla_pro_create_custom_shortcode_person' ) ) {
	/**
	 * Create custom shortcode for persons
	 *
	 * Usage: [log-lolla-pro-person name="John Doe"]
	 *
	 * It needs the People custom post type
	 *
	 * @param  Array $attributes The attributes of the shortcode.
	 * @return string            HTML
	 */
	function log_lolla_pro_create_custom_shortcode_person( $attributes ) {
		// Default attributes.
		$default_attributes = array(
			'name' => 'The person name',
		);

		// Parse attributes.
		$attrs = shortcode_atts( $default_attributes, $attributes );

		// Display the person.
		return log_lolla_pro_get_post_type_person_displayed_as_thumb_html( $attrs['name'] );
	}

	add_shortcode( 'log-lolla-pro-person', 'log_lolla_pro_create_custom_shortcode_person' );
}

if ( ! function_exists( 'log_lolla_pro_create_custom_shortcode_people' ) ) {
	/**
	 * Display most popular people
	 *
	 * Usage: [log-lolla-pro-people people="5"]
	 *
	 * @param  Array $attributes The attributes of the shortcode.
	 * @return string            HTML
	 */
	function log_lolla_pro_create_custom_shortcode_people( $attributes ) {
		// Default attributes.
		$default_attributes = array(
			'people' => 5,
		);

		// Parse attributes.
		$attrs = shortcode_atts( $default_attributes, $attributes );

		return wp_kses_post(
			log_lolla_pro_get_post_type_post_list_popular_as_html(
				'people',
				$attrs['people'],
				'post count',
				log_lolla_pro_get_post_type_label( 'people' ),
				log_lolla_pro_get_link( 'People' )
			)
		);
	}

	add_shortcode( 'log-lolla-pro-people', 'log_lolla_pro_create_custom_shortcode_people' );
}

if ( ! function_exists( 'log_lolla_pro_create_custom_shortcode_topics' ) ) {
	/**
	 * Display popular topics (categories, tags)
	 *
	 * Usage: [log-lolla-pro-topics categories="5" tags="3"]
	 *
	 * @param  Array $attributes The attributes of the shortcode.
	 * @return string            HTML
	 */
	function log_lolla_pro_create_custom_shortcode_topics( $attributes ) {
		// Default attributes.
		$default_attributes = array(
			'categories' => 5,
			'tags'       => 5,
		);

		// Parse attributes.
		$attrs = shortcode_atts( $default_attributes, $attributes );

		return wp_kses_post(
			log_lolla_pro_get_topic_list_with_sparklines_as_html(
				10,
				$attr['categories'],
				$attrs['tags'],
				log_lolla_pro_get_topic_label( 'Topics' ),
				log_lolla_pro_get_link( 'Topics' )
			)
		);
	}

	add_shortcode( 'log-lolla-pro-topics', 'log_lolla_pro_create_custom_shortcode_topics' );
}

if ( ! function_exists( 'log_lolla_pro_create_custom_shortcode_archives_by_date' ) ) {
	/**
	 * Display archives of years and month
	 *
	 * Usage: [log-lolla-pro-archives]
	 *
	 * @param  Array $attributes The attributes of the shortcode.
	 * @return string            HTML
	 */
	function log_lolla_pro_create_custom_shortcode_archives_by_date( $attributes ) {
		// Default attributes.
		$default_attributes = array();

		// Parse attributes.
		$attrs = shortcode_atts( $default_attributes, $attributes );

		return wp_kses_post(
			log_lolla_pro_get_archive_list_by_year_and_months_as_html(
				log_lolla_pro_get_archive_label( 'Archives by date' ),
				log_lolla_pro_get_link( 'Archives by date' )
			)
		);
	}

	add_shortcode( 'log-lolla-pro-archives-by-date', 'log_lolla_pro_create_custom_shortcode_archives_by_date' );
}



/**
 * Shortcode helpers
 */


if ( ! function_exists( 'log_lolla_pro_display_shortcode' ) ) {
	/**
	 * Display a shortcode
	 *
	 * If has `title` it will be displayed in an `aside`
	 *
	 * @param  string $title   The shortcode title.
	 * @param  string $content The shortcode content.
	 * @param  string $url     The shortcode URL.
	 * @return string          HTML
	 */
	function log_lolla_pro_display_shortcode( $title, $content, $url = '' ) {
		$html = '';

		$klass = 'shortcode--' . log_lolla_pro_convert_string_to_classname( $title );

		ob_start();
		set_query_var( 'shortcode_klass', $klass );
		set_query_var( 'shortcode_title', $title );
		set_query_var( 'shortcode_body', $content );

		if ( ! empty( $url ) ) {
			set_query_var( 'shortcode_title_url', $url );
		}

		get_template_part( 'template-parts/shortcode/shortcode', '' );

		$html .= ob_get_clean();

		return $html;
	}
}
