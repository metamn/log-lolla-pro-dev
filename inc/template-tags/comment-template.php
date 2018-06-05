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


if ( ! function_exists( 'log_lolla_comment_permalink' ) ) {
  /**
   * Display comment permalink
   *
   * @param  object $comment The comment
   * @return string          HTML
   */
  function log_lolla_comment_permalink( $comment ) {
    printf(
      '<a class="link" href="%1$s" title="%2$s">%3$s</a>',
      esc_url( get_comment_link( $comment ) ),
      esc_attr( esc_html( 'Comment permalink', 'log-lolla' ) ),
      /* translators: %s: post permalink. */
      esc_html_x( '&infin;', 'post permalink', 'log-lolla' )
    );
  }
}


if ( ! function_exists( 'log_lolla_comment_list_title' ) ) {
  /**
   * Display comments list title for a post
   *
   * @param  integer $number_of_comments The number of comments
   * @param  object  $post               The post
   * @return string                      HTML
   */
  function log_lolla_comment_list_title( $number_of_comments, $post ) {
    $text = '';

    if ( $number_of_comments === 1) {
      $text = esc_html( 'One update', 'log-lolla');
    } else {
      $text = $number_of_comments . esc_html( ' updates' );
    }

    return sprintf(
      '<span class="number-of-comments">%1$s</span>',
      $text
    );
  }
}


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


if ( ! function_exists( 'log_lolla_comment_updated_text' ) ) {
  /**
   * Display updated text to a comment
   *
   * @param  object $comment The comment object
   * @return string          HTML
   */
  function log_lolla_comment_updated_text( $comment ) {
    return sprintf(
     '<h3 class="comment-title">%1$s %2$s</h3>',
     esc_html( 'Update on', 'comment updated text', 'log-lolla' ),
     log_lolla_comment_post_title( $comment )
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
    return sprintf(
     '<a class="link" href="%1$s" title="%2$s">%3$s</a>',
     esc_url( get_permalink( $comment->comment_post_ID ) ),
     esc_attr( get_the_title( $comment->comment_post_ID ) ),
     esc_html( get_the_title( $comment->comment_post_ID ) )
   );
  }
}


if ( ! function_exists( 'log_lolla_comment_content_or_excerpt' ) ) {
  /**
   * Display comment content or excerpt
   *
   * @param  object $comment The comment object
   * @return string          HTML
   */
  function log_lolla_comment_content_or_excerpt( $comment ) {
    if ( log_lolla_word_count( get_comment_text() ) > 60 ) {
      log_lolla_comment_excerpt( $comment );
    } else {
      log_lolla_comment_content( $comment );
    }
  }
}


if ( ! function_exists( 'log_lolla_comment_excerpt' ) ) {
  /**
   * Display comment excerpt
   *
   * @param  object $comment The comment object
   * @return string          HTML
   */
  function log_lolla_comment_excerpt( $comment ) {
    printf(
     '<div class="text">%1$s</div>',
     get_comment_excerpt( $comment )
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
