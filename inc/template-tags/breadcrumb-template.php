<?php
  /**
   * Breadcrumb template tags
   *
   *
   * @package Log_Lolla
   */


if ( ! function_exists( 'log_lolla_display_breadcrumb_for_archive' ) ) {
  /**
   * Display breadcrumbs for an archive
   *
   * @return string HTML
   */
  function log_lolla_display_breadcrumb_for_archive() {
    $deco = array(
      'before_all' => '<ul class="ul">',
      'after_all' => '</ul>',
      'before_each' => '<li class="li">',
      'after_each' => '</li>',
      'separator' => '<li class="li">' . log_lolla_get_triangle_html( 'right' ) . '</li>'
    );
    extract( $deco );

    $links = [];
    $links[] = log_lolla_get_link_html_for( 'Home' );
    $links[] = log_lolla_get_link_html_for( 'Archives' );

    if ( is_tag() ) {
      $links[] = log_lolla_get_link_html_for( 'Tags' );
    }

    if ( is_category() ) {
      $links[] = log_lolla_get_link_html_for( 'Categories' );
    }

    if ( is_singular( 'source' ) ) {
      $links[] = log_lolla_get_link_html_for( 'Sources' );
    }

    if ( is_singular( 'people' ) ) {
      $links[] = log_lolla_get_link_html_for( 'People' );
    }

    if ( is_singular( 'summary' ) ) {
      $links[] = log_lolla_get_link_html_for( 'Summaries' );
    }

    $list = [];

    foreach ($links as $link) {
      if ( ! empty( $link ) ) {
        $list[] = $before_each . $link . $after_each;
      }
    }

    echo $before_all . implode( $separator, $list ) . $after_all;
  }
}
?>
