<?php
  /**
   * Post template tags
   *
   *
   * @link https://codex.wordpress.org/Template_Tags
   *
   * @package Log_Lolla_Pro
   */



if ( ! function_exists( 'log_lolla_get_post_first_image_url' ) ) {
  /**
  * Get the first image from each post and resize it.
  * Returns an URL
  *
  * @link https://css-tricks.com/snippets/wordpress/get-the-first-image-from-a-post/
  *
  * @return string $first_img.
  *
  */
 function log_lolla_get_post_first_image_url() {
 	global $post;
 	$first_img = '';

  preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', do_shortcode( $post->post_content, 'gallery' ), $matches );
  $first_img = isset( $matches[1][0] ) ? $matches[1][0] : null;

 	if ( empty( $first_img ) ) {
 		return get_template_directory_uri() . log_lolla_get_image_not_found_url(); // path to default image.
 	}

	return $first_img;
 }
}


if ( ! function_exists( 'log_lolla_post_has_link' ) ) {
 /**
 * Return true if post has link
 *
 * @return boolen
 */
function log_lolla_post_has_link() {
  $has_title = the_title_attribute( 'echo=0');

  return ( ! empty( $has_title ) );
 }
}



if ( ! function_exists( 'log_lolla_get_link_title_for_link_post_format' ) ) {
  /**
  * Return link title for the link post format
  * Returns either the post title, or url where it points
  *
  * @return string
  */
 function log_lolla_get_link_title_for_link_post_format( $url ) {
   $has_title = the_title_attribute( 'echo=0');

   return ( ! empty( $has_title ) ) ? $has_title : $url;
  }
}


if ( ! function_exists( 'log_lolla_post_link_is_external' ) ) {
  /**
   * Return true is the post link is external
   *
   * @return boolean
   */
  function log_lolla_post_link_is_external() {
    $url = log_lolla_get_link_from_content();
    return ($url === apply_filters( 'the_permalink', get_permalink() ));
  }
}


if ( ! function_exists( 'log_lolla_get_link_from_content_class' ) ) {
  /**
   * Return a class for the link post format
   *
   * @return string
   */
  function log_lolla_get_link_from_content_class( $url ) {
    return ($url === apply_filters( 'the_permalink', get_permalink() )) ? 'local-link' : 'external-link';
  }
}


if ( ! function_exists( 'log_lolla_get_link_from_content' ) ) {
  /**
   * Return link from post content for the link post format
   * Returns either the link, or the post permalink if the link cannot be get
   *
   * @return string
   */
  function log_lolla_get_link_from_content() {
    $content = get_the_content();
  	$has_url = get_url_in_content( $content );

  	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
  }
}


if ( ! function_exists( 'log_lolla_get_post_class' ) ) {
  /**
   * Returns a custom post class
   *
   * @return string
   */
   function log_lolla_get_post_class() {
     // Changing the post grid based on how long a post & it's excerpt is
     $max_word_count = 40;

     $post_word_count = log_lolla_word_count( strip_tags( get_the_content() ) );
     $grid = ( $post_word_count < $max_word_count ) ? ' display-horizontal' : ' display-vertical';
     $klass = '';

     if ( has_excerpt() ) {
       $excerpt_word_count = log_lolla_word_count( strip_tags( get_the_excerpt() ) );
       $grid = ( $excerpt_word_count < $max_word_count ) ? ' display-horizontal' : ' display-vertical';
       $klass .= ' has-excerpt';
     }

     if ( has_post_thumbnail() ) {
       $klass .= ' has-thumbnail';
     }

     return $grid . $klass;
  }
}

?>
