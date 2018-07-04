<?php
/**
 * Post template tags
 *
 * @link https://codex.wordpress.org/Template_Tags
 *
 * @package Log_Lolla_Pro
 */

if ( ! function_exists( 'log_lolla_pro_get_posts_first_and_last_date' ) ) {
	/**
	 * Returns first post and last post published date
	 *
	 * Returns smnthg like Array ( [0] => 2018-03-27 06:21:26 [1] => 2017-12-05 14:27:58 )
	 *
	 * @return array Of two dates
	 */
	function log_lolla_pro_get_posts_first_and_last_date() {
		$posts = get_posts(
			array(
				'posts_per_page' => -1,
				'post_status'    => 'publish',
			)
		);
		if ( empty( $posts ) ) {
			return;
		}

		$first = reset( $posts );
		$last  = end( $posts );
		if ( ( false === $first ) || ( false === $last ) ) {
			return;
		}

		$ret   = [];
		$ret[] = $last->post_date;
		$ret[] = $first->post_date;

		return $ret;
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_first_image_url' ) ) {
	/**
	 * Returns the first image URL from a post.
	 *
	 * @link https://css-tricks.com/snippets/wordpress/get-the-first-image-from-a-post/
	 *
	 * @return string URL to image.
	 */
	function log_lolla_pro_get_post_first_image_url() {
		global $post;
		$first_img = '';

		preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', do_shortcode( $post->post_content, 'gallery' ), $matches );
		$first_img = isset( $matches[1][0] ) ? $matches[1][0] : null;

		if ( empty( $first_img ) ) {
			return get_template_directory_uri() . log_lolla_pro_get_image_url_not_found(); // path to default image.
		}

		return $first_img;
	}
}

if ( ! function_exists( 'log_lolla_pro_post_has_link' ) ) {
	/**
	 * Returns true if post has link
	 *
	 * @return boolen
	 */
	function log_lolla_pro_post_has_link() {
		$has_title = the_title_attribute( 'echo=0' );

		return ( ! empty( $has_title ) );
	}
}

if ( ! function_exists( 'log_lolla_pro_post_link_is_external' ) ) {
	/**
	 * Returns true is the post link is external
	 *
	 * @param string $url The url to compare with the post permalink.
	 * @return boolean    True if the post permalink is the same as the $url.
	 */
	function log_lolla_pro_post_link_is_external( $url ) {
		$permalink = apply_filters( 'the_permalink', get_permalink() );

		if ( $url === $permalink ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_link_from_content' ) ) {
	/**
	 * Returns link from post content.
	 * Returns either the link, or the post permalink if the link cannot be get
	 *
	 * @return string
	 */
	function log_lolla_pro_get_post_link_from_content() {
		$content = get_the_content();
		$has_url = get_url_in_content( $content );

		return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
	}
}

if ( ! function_exists( 'log_lolla_pro_get_post_class' ) ) {
	/**
	 * Returns a custom post class
	 *
	 * @return string
	 */
	function log_lolla_pro_get_post_class() {
		// Changing the post grid based on how long a post & it's excerpt is.
		$max_word_count = 40;

		$post_word_count = log_lolla_pro_count_words( strip_tags( get_the_content() ) );
		$grid            = ( $post_word_count < $max_word_count ) ? ' display-horizontal' : ' display-vertical';
		$klass           = '';

		if ( has_excerpt() ) {
			$excerpt_word_count = log_lolla_pro_count_words( strip_tags( get_the_excerpt() ) );
			$grid               = ( $excerpt_word_count < $max_word_count ) ? ' display-horizontal' : ' display-vertical';
			$klass             .= ' has-excerpt';
		}

		if ( has_post_thumbnail() ) {
			$klass .= ' has-thumbnail';
		}

		return $grid . $klass;
	}
}
