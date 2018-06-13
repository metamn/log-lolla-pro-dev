<?php
  /**
   * Template part for displaying posts associated to a source
   *
   * Posts will be displayed using the common `archive-list` template
   *
   * @package Log_Lolla_Pro
   */
?>

<?php
  $posts_of_a_source = log_lolla_get_posts_of_a_post_type( $post );
  if ( empty( $posts_of_a_source ) ) return;

  $archive_posts_title = sprintf(
    '%1$s%2$s',
    esc_html_x( 'Posts from ', 'post permalink', 'log-lolla' ),
    get_the_title()
  );

  set_query_var( 'archive_posts_klass', 'archive-list--posts' );
  set_query_var( 'archive_posts_title', $archive_posts_title );
  set_query_var( 'archive_posts_posts', $posts_of_a_source );

  get_template_part( 'template-parts/archive/archive', 'posts' );
?>
