<?php
/**
 * The source code of the Topics widget.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

/**
 * The Topics Widget.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */
class Log_Lolla_Pro_Topics_Widget extends WP_Widget {
	/**
	 * Register Widget
	 */
	public function __construct() {
		parent::__construct(
			'log_lolla_pro_topics_widget',
			esc_html__( 'Log Lolla Pro Topics' ),
			array(
				'description'          => __( 'Display popular topics (categories, tags)', 'log_lolla_pro' ),
				'number_of_categories' => esc_html__( 'Number of categories to display', 'log_lolla_pro' ),
				'number_of_tags'       => esc_html__( 'Number of tags to display', 'log_lolla_pro' ),
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
		$title = apply_filters( 'widget_title', esc_html__( 'Topics' ) );

		$content = log_lolla_pro_get_topic_list_with_sparklines_as_html(
			10,
			$instance['number_of_categories'],
			$instance['number_of_tags']
		);

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
		$form .= log_lolla_pro_display_widget_form_label( $this, 'number_of_categories' );
		$form .= log_lolla_pro_display_widget_form_input(
			$this,
			'number_of_categories',
			'number',
			$instance['number_of_categories']
		);
		$form .= '</p>';

		$form .= '<p>';
		$form .= log_lolla_pro_display_widget_form_label( $this, 'number_of_tags' );
		$form .= log_lolla_pro_display_widget_form_input(
			$this,
			'number_of_tags',
			'number',
			$instance['number_of_tags']
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
		$instance = array();

		$instance['number_of_categories'] = ( ! empty( $new_instance['number_of_categories'] ) ) ? filter_var( $new_instance['number_of_categories'], FILTER_SANITIZE_NUMBER_INT ) : '0';
		$instance['number_of_tags']       = ( ! empty( $new_instance['number_of_tags'] ) ) ? filter_var( $new_instance['number_of_tags'], FILTER_SANITIZE_NUMBER_INT ) : '0';

		return $instance;
	}
}
add_action(
	'widgets_init', function() {
		register_widget( 'Log_Lolla_Pro_Topics_Widget' );
	}
);
