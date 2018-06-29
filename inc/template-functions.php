<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

/**
 * Remove archive type from archive title
 *
 * Example: `Category: News` => `News`
 *
 * @param  string $title Archive title with archive type.
 * @return string        Archive title
 */
function log_lolla_pro_get_the_archive_title( $title ) {
	$split = explode( ': ', $title );

	if ( $split[1] ) {
		return $split[1];
	} else {
		return $title;
	}
}
add_filter( 'get_the_archive_title', 'log_lolla_pro_get_the_archive_title', 10, 1 );

/**
 * Remove `<p>` and `<br>` tags added by WordPress.
 * If not, the 'Continue reading -->' arrow will be completely broken.
 *
 * @link https://wordpress.stackexchange.com/questions/130075/stop-wordpress-automatically-adding-br-tags-to-post-content
 */
remove_filter( 'the_excerpt', 'wpautop' );


/**
 * Add 'continue reading' link text to post content
 *
 * @return string
 */
function log_lolla_pro_add_readmore_to_content() {
	$arrow = log_lolla_pro_get_arrow_html( 'right' );

	$read_more = sprintf(
		'%1$s %2$s',
		/* translators: %s: continue reading. */
		esc_html_x( 'Continue reading', 'continue-reading', 'log-lolla-pro' ),
		$arrow
	);

	return $read_more;
}


/**
 * Add 'continue reading' link text to post excerpt
 *
 * @param [string] $excerpt the post excerpt.
 * @return string
 */
function log_lolla_pro_add_readmore_to_excerpt( $excerpt ) {
	$arrow = log_lolla_pro_get_arrow_html( 'right' );

	$read_more = sprintf(
		'<p><a class="more-link" href="' . esc_url( get_permalink() ) . '" title="' . the_title_attribute( 'echo=0' ) . '">%1$s %2$s</a></p>',
		/* translators: %s: continue reading. */
		esc_html_x( 'Continue reading', 'continue-reading', 'log-lolla-pro' ),
		$arrow
	);

	return $excerpt . $read_more;
}
add_filter( 'get_the_excerpt', 'log_lolla_pro_add_readmore_to_excerpt', 10, 1 );




/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function log_lolla_pro_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'log_lolla_pro_body_classes', 10, 1 );



/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function log_lolla_pro_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'log_lolla_pro_pingback_header', 10, 1 );
