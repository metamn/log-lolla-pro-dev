<?php
  /**
   * Custom widgets
   *
   * @link https://developer.wordpress.org/themes/functionality/widgets/
   *
   * @package Log_Lolla
   */
?>

<?php

 /**
  * The Sources widget
  */
 class Log_Lolla_Sources_Widget extends WP_Widget {
  /**
   * Register Widget
   */
  public function __construct() {
    parent::__construct(
      'log_lolla_sources_widget',
      esc_html__( 'Log Lolla Sources', 'log-lolla'),
      array(
        'description' => esc_html__( 'Display sources archive', 'log_lolla' ),
        'number_of_sources' => esc_html__( 'Number of sources to display', 'log_lolla' )
      )
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
    $description = apply_filters( 'widget_description', $instance['description'] );
    $content = log_lolla_display_sources_with_post_count();

    echo $before_widget;
    echo log_lolla_display_widget( $title, $description, $content );
    echo $after_widget;
  }

  /**
   * Display widget on the backend
   *
   * @param  [type] $instance [description]
   * @return [type]           [description]
   */
  public function form( $instance ) {
    $form = '';

    $form .= '<p>';
    $form .= log_lolla_display_widget_form_label( $this, 'number_of_sources' );
    $form .= log_lolla_display_widget_form_input(
      $this,
      'number_of_sources',
      'number',
      $instance['number_of_sources']
    );
    $form .= '</p>';

    echo $form;
  }

  /**
   * Process widget options to be saved
   *
   * @param  [type] $new_instance [description]
   * @param  [type] $old_instance [description]
   * @return [type]               [description]
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
		$instance['number_of_sources'] = ( ! empty( $new_instance['number_of_sources'] ) ) ? filter_var( $new_instance['number_of_sources'], FILTER_SANITIZE_NUMBER_INT ) : '0';

		return $instance;
  }
 }
 add_action( 'widgets_init', function() { register_widget( 'Log_Lolla_Sources_Widget' ); } );




 /**
  * The Post Formats widget
  */
 class Log_Lolla_Post_Formats_Widget extends WP_Widget {
  /**
   * Register Widget
   */
  public function __construct() {
    parent::__construct(
      'log_lolla_post_formats_widget', // Base ID
      'Log Lolla Post Formats', // Name
      array( 'description' => __( 'Display post formats archive', 'log_lolla' ), ) // Args
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
    $description = apply_filters( 'widget_description', $instance['description'] );
    $content = log_lolla_display_post_formats_with_post_count();

    echo $before_widget;
    echo log_lolla_display_widget( $title, $description, $content );
    echo $after_widget;
  }

  /**
   * Display widget on the backend
   *
   * @param  [type] $instance [description]
   * @return [type]           [description]
   */
  public function form( $instance ) {
    //
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
 add_action( 'widgets_init', function() { register_widget( 'Log_Lolla_Post_Formats_Widget' ); } );



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
      'Log Lolla People', // Name
      array( 'description' => __( 'Display most poular people', 'log_lolla' ), ) // Args
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
    $description = apply_filters( 'widget_description', $instance['description'] );
    $content = log_lolla_display_people_with_post_count( 5 );

    echo $before_widget;
    echo log_lolla_display_widget( $title, $description, $content );
    echo $after_widget;
  }

  /**
   * Display widget on the backend
   *
   * @param  [type] $instance [description]
   * @return [type]           [description]
   */
  public function form( $instance ) {
    //
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
      'Log Lolla Topics', // Name
      array( 'description' => __( 'Display popular topics (categories, tags)', 'log_lolla' ), ) // Args
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
    $description = apply_filters( 'widget_description', $instance['description'] );
    $content = log_lolla_display_topics_with_sparklines(10, 5, 5);

    echo $before_widget;
    echo log_lolla_display_widget( $title, $description, $content );
    echo $after_widget;
  }

  /**
   * Display widget on the backend
   *
   * @param  [type] $instance [description]
   * @return [type]           [description]
   */
  public function form( $instance ) {
    //
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
     'log_lolla_archives_widget',
     'Log Lolla Archives',
     array(
       'description' => __( 'Display archives of years and months', 'log_lolla' )
     )
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
   $description = apply_filters( 'widget_description', $instance['description'] );
   $content = log_lolla_display_archives_by_year_and_month();

   echo $before_widget;
   echo log_lolla_display_widget( $title, $description, $content );
   echo $after_widget;
 }

 /**
  * Display widget on the backend
  *
  * @param  [type] $instance [description]
  * @return [type]           [description]
  */
 public function form( $instance ) {
   //
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


if ( ! function_exists( 'log_lolla_display_widget_form_input' ) ) {
  /**
   * Display an input field for the widget form
   *
   * @param  OBJECT $that         The widget instance (ie. $this)
   * @param  string $field_id     The field id
   * @param  string $input_type   The type of the input
   * @param  string $input_value  The default value of the input
   * @return string               HTML
   */
  function log_lolla_display_widget_form_input( $that, $field_id, $input_type = 'text', $input_value = '' ) {
    if ( empty( $that ) ) return;
    if ( empty( $field_id ) ) return;

    $input_id = esc_attr( $that->get_field_id( $field_id ) );
    $input_name = esc_attr( $that->get_field_name( $field_id ) );

    $html = '<input id="' . $input_id . '" name="' . $input_name . '" type="' . $input_type . '" value="' . $input_value . '">';

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_display_widget_form_label' ) ) {
  /**
   * Display a label for the widget form
   *
   * @param  OBJECT $that     The widget instance (ie. $this)
   * @param  string $field_id The field id
   * @return string           HTML
   */
  function log_lolla_display_widget_form_label( $that, $field_id ) {
    if ( empty( $that ) ) return;
    if ( empty( $field_id ) ) return;

    $html = '<label for="' . esc_attr( $that->get_field_id( $field_id ) ) . '">';
    $html .= esc_attr__( $that->widget_options[$field_id] );
    $html .= '</label>';

    return $html;
  }
}


if ( ! function_exists( 'log_lolla_display_widget' ) ) {
  /**
   * Display a widget
   *
   * @param  string $title   Widget title
   * @param  string $content Widget content, HTML
   * @return string          HTML
   */
  function log_lolla_display_widget( $title, $description = '', $content ) {
    if ( empty( $title ) ) return;
    $html = log_lolla_display_widget_title( $title );

    if ( ! empty( $description ) ) {
      $html .= '<div class="widget_description">' . $description . '</div>';
    }

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

    $html = '';

    if ( ! empty( $container_class_name ) ) {
      $html .= '<div class="' . $container_class_name . '">';
    }

    foreach ( $items as $index => $item ) {
      if ( ! empty( $item_class_name ) ) {
        $html .= '<div class="' . $item_class_name . '">';
      }

      $html .= $callback( $item, $index );

      if ( ! empty( $item_class_name ) ) {
        $html .= '</div>';
      }
    }

    if ( ! empty( $container_class_name ) ) {
      $html .= '</div>';
    }

    return $html;
  }
}

?>
