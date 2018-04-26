<?php
  /**
   * Summaries template tags for this theme
   *
   * Contains custom template tags related to categories and tags
   *
   * @link https://codex.wordpress.org/Template_Tags
   *
   * @package Log_Lolla
   */


if ( ! function_exists( 'log_lolla_display_summaries_for_archive' ) ) {
  /**
   * Display summaries for an archive
   *
   * @param  Object $archive The archive
   * @return string          HTML
   */
  function log_lolla_display_summaries_for_archive( $archive ) {
    if ( empty( $archive ) ) return;

    $summaries = log_lolla_get_summaries_for_archive( $archive );
    if ( empty( $summaries ) ) return;

    $html = '<section class="summaries">';
    $html .= '<h3 class="summaries-title">';
    $html .= esc_html_x( 'Summaries', 'log-lolla' );
    $html .= '</h3>';

    global $post;
    ob_start();
    foreach ( $summaries as $post ) {
      setup_postdata( $post );
      get_template_part( 'template-parts/post/post', 'search' );
    }
    wp_reset_postdata();
    $html .= ob_get_clean();

    $html .= '</section>';

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_get_summaries_for_archive' ) ) {
  /**
   * Get summaries for an archive
   *
   * @param  Object $archive The archive
   * @return Array          The list of posts
   */
  function log_lolla_get_summaries_for_archive( $archive ) {
    if ( empty( $archive ) ) return;

    $posts = get_posts(
      array(
        'post_type' => 'summary',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'tax_query' => array(
          array(
            'taxonomy' => $archive->taxonomy,
            'field' => 'slug',
            'terms' => $archive->slug
          )
        )
      )
    );

    return $posts;
  }
}


?>
