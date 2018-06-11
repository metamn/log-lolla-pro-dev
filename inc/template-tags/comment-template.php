<?php
  /**
   * Comment template tags for this theme
   *
   * Contains custom template tags related to comments
   *
   * @link https://codex.wordpress.org/Template_Tags
   *
   * @package Log_Lolla
   */




if ( ! function_exists( 'log_lolla_get_comments_of_a_post' ) ) {
  /**
   * Returns only the comments of a post without anything else like pingbacks and trackbacks
   *
   * @param  object $post The post
   * @return array        A list of comments
   */
  function log_lolla_get_comments_of_a_post( $post ) {
    return get_comments(
      array(
        'post_id' => $post->ID,
        'status' => 'approve',
        'type' => 'comment'
      )
    );
  }
}



if ( ! function_exists( 'log_lolla_get_comments_before_date' ) ) {
  /**
   * Return comments created before a date
   *
   * @param  array  $comments An array of comments
   * @param  string $post     A date
   * @return array            An array of comments
   */
  function log_lolla_get_comments_before_date( $comments, $date ) {
    if ( empty( $comments ) || empty( $date ) ) return;

    return array_map(
      function ( $c ) use ( $date ) {
        if ( strtotime( $c->comment_date ) > strtotime( $date ) ) {
          return $c;
        }
      },
      $comments
    );
  }
}


if ( ! function_exists( 'log_lolla_get_comments_for_the_loop' ) ) {
  /**
   * Get comments between two dates defined by the loop
   *
   * Comments between the first and last post's date will be returned
   *
   * @param  array $posts An array of posts from the loop
   * @return array        An array of comments
   */
  function log_lolla_get_comments_for_the_loop( $posts ) {
    if ( empty( $posts ) ) return;

    $first_post_date = get_the_date( '', $posts[0] );
    $last_post_date = get_the_date( '', array_values( array_slice( $posts, -1 ) )[0] );

    return get_comments(
      array(
        'status' => 'approve',
        'post_status' => 'publish',
        'type' => 'comment',
        'date_query' => array(
          'after' => $last_post_date,
          'before' => $first_post_date,
          'inclusive' => true
        )
      )
    );
  }
}


?>
