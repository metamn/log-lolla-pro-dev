<?php

  /**
   * Custom widgets for this theme
   */

  if ( ! function_exists( 'log_lolla_widget_topics' ) ) {
    /**
     * The topics widget
     *
     * @return string HTML
     */
    function log_lolla_widget_topics() {
      $html = log_lolla_widget_helper_title( 'Topics' );

      $topics = log_lolla_display_topics_with_count(5, 5);
      if ( empty( $topics ) ) return $html;

      $html .= '<div class="widget-body">';
      $html .= $topics;
      $html .= '</div>';

      return $html;
    }
  }

  if (! function_exists( 'log_lolla_widget_archives' ) ) {
    /**
     * The archives widget
     *
     * @return string HTML
     */
    function log_lolla_widget_archives() {
      $html = log_lolla_widget_helper_title( 'Archives' );

      $archives = log_lolla_display_archives_by_year_and_month();
      if ( empty( $archives ) ) return $html;

      $html .= '<div class="widget-body">';
      $html .= $archives;
      $html .= '</div>';

      return $html;
    }
  }


  /**
   * Custom widget helpers
   */

  if ( ! function_exists( 'log_lolla_widget_helper_title' ) ) {
    /**
     * Render title for a widegt
     *
     * @param  string $title The title of the widget
     * @return string        HTML
     */
    function log_lolla_widget_helper_title($title) {
      $html = '<h3 class="widget-title">';
      $html .= __( $title, 'log_lolla' );
      $html .= '</h3>';

      return $html;
    }
  }

?>
