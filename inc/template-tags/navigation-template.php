<?php
  /**
   * Navigation template
   *
   * Contains custom template tags for pages, posts, archives navigation
   *
   * @package Log_Lolla
   */


if ( ! function_exists( 'log_lolla_archive_breadcrumbs' ) ) {
  function log_lolla_archive_breadcrumbs() {
    $deco = array(
      'before_all' => '<ul class="ul">',
      'after_all' => '</ul>',
      'before_each' => '<li class="li">',
      'after_each' => '</li>',
      'separator' => '<li class="li">' . log_lolla_get_triangle_html( 'right' ) . '</li>'
    );
    extract( $deco );

    $links = [];
    $links[] = log_lolla_get_link_html( esc_url( home_url( '/' ) ), 'Home', 'Home' );
    $links[] = log_lolla_get_link_html( esc_url( home_url( '/' ) ), 'Archives', 'Archives' );

    if ( is_tag() ) {
      $links[] = log_lolla_get_link_html( esc_url( home_url( '/' ) ), 'Tags', 'tags' );
    }

    $list = [];

    foreach ($links as $link) {
      $list[] = $before_each . $link . $after_each;
    }

    echo $before_all . implode( $separator, $list ) . $after_all;
  }
}
?>
