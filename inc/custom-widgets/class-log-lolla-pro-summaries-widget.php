<?php
/**
 * The source code of the Summaries widget.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

/**
 * The Summaries Widget.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */
class Log_Lolla_Pro_Summaries_Widget extends WP_Widget {
	/**
	 * Register Widget
	 */
	public function __construct() {
		parent::__construct(
			'log_lolla_pro_summaries_widget',
			'Log Lolla Pro ' . log_lolla_pro_get_post_type_label( 'summary' ),
			array(
				/* translators: The Summary widget description on the admin screen */
				'description'         => esc_html__( 'Display summaries archive', 'log_lolla_pro' ),
				/* translators: The Summary widget `number of summaries to display` text on the admin screen */
				'number_of_summaries' => esc_html__( 'Number of summaries to display', 'log_lolla_pro' ),
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
			log_lolla_pro_get_post_type_summary_post_list_as_html(
				$instance['number_of_summaries'],
				log_lolla_pro_get_post_type_label( 'summary' ),
				log_lolla_pro_get_link( 'Summaries' )
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
		$form .= log_lolla_pro_display_widget_form_label( $this, 'number_of_summaries' );
		$form .= '<br/>';
		$form .= log_lolla_pro_display_widget_form_input(
			$this,
			'number_of_summaries',
			'number',
			$instance['number_of_summaries']
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
		$instance                        = array();
		$instance['number_of_summaries'] = ( ! empty( $new_instance['number_of_summaries'] ) ) ? filter_var( $new_instance['number_of_summaries'], FILTER_SANITIZE_NUMBER_INT ) : '0';

		return $instance;
	}
}

if ( ! function_exists( 'log_lolla_pro_register_summaries_widget' ) ) {
	/**
	 * Register the widget.
	 */
	function log_lolla_pro_register_summaries_widget() {
		register_widget( 'Log_Lolla_Pro_Summaries_Widget' );
	}

	add_action( 'widgets_init', 'log_lolla_pro_register_summaries_widget' );
}
