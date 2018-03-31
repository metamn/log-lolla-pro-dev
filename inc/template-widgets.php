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

    $html .= get_calendar(true, false);

    return $html;
  }
}

?>
