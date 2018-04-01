<?php

  /**
   * Custom widgets for this theme
   */

if (! function_exists( 'log_lolla_widget_archives' ) ) {
  /**
   * The archives widget
   */
  function log_lolla_widget_archives() {
    $html = '<h3 class="widget-title">';
    $html .= __( 'Archives', 'log_lolla' );
    $html .= '</h3>';

    $archives = log_lolla_display_archives_by_year_and_month();
    if ( empty( $archives ) ) return $html;

    $html .= '<div class="widget-body">';
    $html .= $archives;
    $html .= '</div>';

    return $html;
  }
}

?>
