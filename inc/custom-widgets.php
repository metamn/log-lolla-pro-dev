<?php
  /**
   * Custom widgets
   *
   * @link https://developer.wordpress.org/themes/functionality/widgets/
   *
   * @package Log_Lolla
   */


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

       echo $before_widget;
       echo __( 'Archives', 'log_lolla' );
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

?>
