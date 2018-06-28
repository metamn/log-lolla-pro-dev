<?php
/**
 * The source code of the Post Formats widget.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

/**
 * The Post Formats Widget.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */
class Log_Lolla_Pro_Post_Formats_Widget extends WP_Widget {
	/**
	 * Register Widget
	 */
	public function __construct() {
		parent::__construct(
			'log_lolla_pro_post_formats_widget',
			esc_html__( 'Log Lolla Pro Post Formats' ),
			array(
				'description'            => esc_html__( 'Display post formats archive', 'log_lolla_pro' ),
				'number_of_post_formats' => esc_html__( 'Number of post formats to display', 'log_lolla_pro' ),
			)
		);
	}

	/**
	 * Display widget on frontend
	 *
	 * @param  array $args     The widget arguments.
	 * @param  array $instance The instance of the widget.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', esc_html__( 'Post Formats' ) );

		$content = log_lolla_pro_display_post_formats_with_post_count();

		if ( ! empty( $content ) ) {
			printf(
				'%1$s%2$s%3$s',
				wp_kses_post( $args['before_widget'] ),
				wp_kses_post( log_lolla_pro_display_widget( $title, $content ) ),
				wp_kses_post( $args['after_widget'] )
			);
		}
	}

	/**
	 * Display widget on the backend
	 *
	 * @param  array $instance The widget instance.
	 */
	public function form( $instance ) {
		$form = '';

		$form .= '<p>';
		$form .= log_lolla_pro_display_widget_form_label( $this, 'number_of_post_formats' );
		$form .= log_lolla_pro_display_widget_form_input(
			$this,
			'number_of_post_formats',
			'number',
			$instance['number_of_post_formats']
		);
		$form .= '</p>';

		echo wp_kses( $form );
	}

	/**
	 * Process widget options to be saved
	 *
	 * @param  array $new_instance The new widget instance.
	 * @param  array $old_instance The old widget instance.
	 * @return array              An instance
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                           = array();
		$instance['number_of_post_formats'] = ( ! empty( $new_instance['number_of_post_formats'] ) ) ? filter_var( $new_instance['number_of_post_formats'], FILTER_SANITIZE_NUMBER_INT ) : '0';

		return $instance;
	}
}
add_action(
	'widgets_init', function() {
		register_widget( 'Log_Lolla_Pro_Post_Formats_Widget' );
	}
);
