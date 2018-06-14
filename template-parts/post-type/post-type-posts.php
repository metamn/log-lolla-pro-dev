<?php
  /**
   * Template part to display posts of a post type (like source, people)
   *
   * @package Log_Lolla_Pro
   */

  $posts = log_lolla_get_posts_of_a_post_type( $post );
  if ( empty( $posts ) ) return;

  $archive_posts_title = sprintf(
    '%1$s%2$s',
    esc_html_x( 'Posts from ', 'post permalink', 'log-lolla' ),
    get_the_title()
  );

  set_query_var( 'archive_posts_klass', 'archive-list--posts' );
  set_query_var( 'archive_posts_title', $archive_posts_title );
  set_query_var( 'archive_posts_posts', $posts );

  get_template_part( 'template-parts/archive/archive', 'posts' );
?>
