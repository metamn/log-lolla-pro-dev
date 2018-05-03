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


if ( ! function_exists( 'log_lolla_comment_date' ) ) {
  /**
   * Display comment date
   *
   * @param  object $comment The comment object
   * @return string          HTML
   */
  function log_lolla_comment_date( $comment ) {
    printf(
     '<div class="posted-on"><time class="date published" datetime="%1$s">%2$s</time></div>',
     esc_attr( get_comment_date( 'c' ) . ', ' .  get_comment_time( 'c' ) ),
     esc_html( get_comment_date() . ', ' . get_comment_time() )
   );
  }
}


if ( ! function_exists( 'log_lolla_comment_post_title' ) ) {
  /**
   * Display post title associated with a comment
   *
   * @param  object $comment The comment object
   * @return string          HTML
   */
  function log_lolla_comment_post_title( $comment ) {
    printf(
     '<a class="link" href="%1$s" title="%2$s">%3$s</a>',
     esc_url( get_permalink( $comment->post_ID ) ),
     esc_attr( get_the_title( $comment->post_ID ) ),
     esc_html( get_the_title( $comment->post_ID ) )
   );
  }
}


if ( ! function_exists( 'log_lolla_comment_content' ) ) {
  /**
   * Display comment content
   *
   * @param  object $comment The comment object
   * @return string          HTML
   */
  function log_lolla_comment_content( $comment ) {
    printf(
     '<div class="text">%1$s</div>',
     get_comment_text()
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
