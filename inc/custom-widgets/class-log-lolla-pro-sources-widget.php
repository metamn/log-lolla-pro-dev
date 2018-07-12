<?php
/**
 * The source code of the Sources widget.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

/**
 * The Sources Widget.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */
class Log_Lolla_Pro_Sources_Widget extends WP_Widget {
	/**
	 * Register Widget
	 */
	public function __construct() {
		parent::__construct(
			'log_lolla_pro_sources_widget',
			esc_html__( 'Log Lolla Pro Sources' ),
			array(
				'description'       => esc_html__( 'Display sources archive', 'log_lolla_pro' ),
				'number_of_sources' => esc_html__( 'Number of sources to display', 'log_lolla_pro' ),
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
		echo wp_kses_post(
			log_lolla_pro_get_post_type_post_list_popular_as_html(
				'source',
				$instance['number_of_sources'],
				'post count',
				log_lolla_pro_get_post_type_label( 'source' ),
				log_lolla_pro_get_link( 'Sources' )
			)
		);
	}

	/**
	 * Display widget on the backend
	 *
	 * @param  array $instance The widget instance.
	 */
	public function form( $instance ) {
		$form = '';

		$form .= '<p>';
		$form .= log_lolla_pro_display_widget_form_label( $this, 'number_of_sources' );
		$form .= '<br/>';
		$form .= log_lolla_pro_display_widget_form_input(
			$this,
			'number_of_sources',
			'number',
			$instance['number_of_sources']
		);
		$form .= '</p>';

		global $log_lolla_pro_custom_kses_for_widgets;
		echo wp_kses( $form, $log_lolla_pro_custom_kses_for_widgets );
	}

	/**
	 * Process widget options to be saved
	 *
	 * @param  array $new_instance The new widget instance.
	 * @param  array $old_instance The old widget instance.
	 * @return array              An instance
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                      = array();
		$instance['number_of_sources'] = ( ! empty( $new_instance['number_of_sources'] ) ) ? filter_var( $new_instance['number_of_sources'], FILTER_SANITIZE_NUMBER_INT ) : '0';

		return $instance;
	}
}
add_action(
	'widgets_init', function() {
		register_widget( 'Log_Lolla_Pro_Sources_Widget' );
	}
);
