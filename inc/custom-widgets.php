<?php

/**
 * Custom widgets
 *
 * @link https://developer.wordpress.org/themes/functionality/widgets/
 *
 * @package Log_Lolla
 */



 /**
  * The People widget
  */
 class Log_Lolla_People_Widget extends WP_Widget {
  /**
   * Register Widget
   */
  public function __construct() {
    parent::__construct(
      'log_lolla_people_widget', // Base ID
      'Log Lolla People Widget', // Name
      array( 'description' => __( 'Log Lolla People Widget', 'log_lolla' ), ) // Args
    );
  }

  /**
   * Display widget on frontend
   *
   * @param  [type] $args     [description]
   * @param  [type] $instance [description]
   * @return [type]           [description]
   */
  public function widget( $args, $instance ) {
    extract( $args );

    $title = apply_filters( 'widget_title', $instance['title'] );
    $content = log_lolla_display_people_with_post_count( 5 );

    echo $before_widget;
    echo log_lolla_display_widget( 'People', $content );
    echo $after_widget;
  }

  /**
   * Display widget on the backend
   *
   * @param  [type] $instance [description]
   * @return [type]           [description]
   */
  public function form( $instance ) {
    echo __( 'Will display people', 'log_lolla' );
  }

  /**
   * Process widget options to be saved
   *
   * @param  [type] $new_instance [description]
   * @param  [type] $old_instance [description]
   * @return [type]               [description]
   */
  public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
  }
 }
 add_action( 'widgets_init', function() { register_widget( 'Log_Lolla_People_Widget' ); } );



 /**
  * The Topics widget
  */
 class Log_Lolla_Topics_Widget extends WP_Widget {
  /**
   * Register Widget
   */
  public function __construct() {
    parent::__construct(
      'log_lolla_topics_widget', // Base ID
      'Log Lolla Topics Widget', // Name
      array( 'description' => __( 'Log Lolla Topics Widget', 'log_lolla' ), ) // Args
    );
  }

  /**
   * Display widget on frontend
   *
   * @param  [type] $args     [description]
   * @param  [type] $instance [description]
   * @return [type]           [description]
   */
  public function widget( $args, $instance ) {
    extract( $args );

    $title = apply_filters( 'widget_title', $instance['title'] );
    //$content = log_lolla_display_topics_with_sparklines(10, 5, 5);
    $content = log_lolla_display_topics_with_count(5, 5);

    echo $before_widget;
    echo log_lolla_display_widget( 'Topics', $content );
    echo $after_widget;
  }

  /**
   * Display widget on the backend
   *
   * @param  [type] $instance [description]
   * @return [type]           [description]
   */
  public function form( $instance ) {
    echo __( 'Will display topics (categories, tags) the Log Lolla way', 'log_lolla' );
  }

  /**
   * Process widget options to be saved
   *
   * @param  [type] $new_instance [description]
   * @param  [type] $old_instance [description]
   * @return [type]               [description]
   */
  public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
  }
 }
 add_action( 'widgets_init', function() { register_widget( 'Log_Lolla_Topics_Widget' ); } );


/**
 * The Archives widget
 */
class Log_Lolla_Archives_Widget extends WP_Widget {
 /**
  * Register Widget
  */
 public function __construct() {
   parent::__construct(
     'log_lolla_archives_widget', // Base ID
     'Log Lolla Archives Widget', // Name
     array( 'description' => __( 'Log Lolla Archives Widget', 'log_lolla' ), ) // Args
   );
 }

 /**
  * Display widget on frontend
  *
  * @param  [type] $args     [description]
  * @param  [type] $instance [description]
  * @return [type]           [description]
  */
 public function widget( $args, $instance ) {
   extract( $args );

   $title = apply_filters( 'widget_title', $instance['title'] );
   $content = log_lolla_display_archives_by_year_and_month();

   echo $before_widget;
   echo log_lolla_display_widget( 'Archives', $content );
   echo $after_widget;
 }

 /**
  * Display widget on the backend
  *
  * @param  [type] $instance [description]
  * @return [type]           [description]
  */
 public function form( $instance ) {
   echo __( 'Will display archives the Log Lolla way', 'log_lolla' );
 }

 /**
  * Process widget options to be saved
  *
  * @param  [type] $new_instance [description]
  * @param  [type] $old_instance [description]
  * @return [type]               [description]
  */
 public function update( $new_instance, $old_instance ) {
   // processes widget options to be saved
 }
}
add_action( 'widgets_init', function() { register_widget( 'Log_Lolla_Archives_Widget' ); } );




/**
 * Widget helpers
 */


if ( ! function_exists( 'log_lolla_display_widget' ) ) {
  /**
   * Display a widget
   *
   * @param  string $title   Widget title
   * @param  string $content Widget content, HTML
   * @return string          HTML
   */
  function log_lolla_display_widget( $title, $content ) {
    if ( empty( $title ) ) return;
    $html = log_lolla_display_widget_title( $title );

    if ( empty( $content )) return $html;
    $html .= '<div class="widget-body">';
    $html .= $content;
    $html .= '</div>';

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_display_widget_title' ) ) {
  /**
   * Render title for a widegt
   *
   * @param  string $title The title of the widget
   * @return string        HTML
   */
  function log_lolla_display_widget_title( $title ) {
    $html = '<h3 class="widget-title">';
    $html .= __( $title, 'log_lolla' );
    $html .= '</h3>';

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_display_widget_body' ) ) {
  function log_lolla_display_widget_body( $container_class_name, $item_class_name, $items, $callback ) {
    if ( empty( $items ) ) return;

    $html .= '<div class="' . $container_class_name . '">';

    foreach ( $items as $item ) {
      $html .= '<div class="' . $item_class_name . '">';
      $html .= $callback( $item );
      $html .= '</div>';
    }

    $html .= '</div>';

    return $html;
  }
}

?>
