<?php
  /**
   * Template part for displaying posts associated to a source
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package Log_Lolla
   */
?>

<?php
  $posts_of_a_source = log_lolla_get_posts_of_a_source( $post );
  if ( empty( $posts_of_a_source ) ) return;

  $archive_list_title = sprintf(
    '<h3 class="archive-list-title">%1$s%2$s</h3>',
    esc_html_x( 'Posts from ', 'post permalink', 'log-lolla' ),
    get_the_title()
  );

  set_query_var( 'archive_list_klass', 'archive-list--posts' );
  set_query_var( 'archive_list_title', $archive_list_title );
  set_query_var( 'archive_list_posts', $posts_of_a_source );

  get_template_part( 'template-parts/archive/parts/archive', 'list' );
?>
