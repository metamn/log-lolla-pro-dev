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
			'Log Lolla Pro ' . log_lolla_pro_get_topic_label( 'Topics' ),
			array(
				/* translators: The Topics widget description on the admin screen */
				'description'          => __( 'Display popular topics (categories, tags)', 'log_lolla_pro' ),
				/* translators: The Topics widget `number of categories to display` text on the admin screen */
				'number_of_categories' => esc_html__( 'Number of categories to display', 'log_lolla_pro' ),
				/* translators: The Topics widget `number of tags to display` text on the admin screen */
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
		echo wp_kses_post(
			log_lolla_pro_get_topic_list_with_sparklines_as_html(
				10,
				$instance['number_of_categories'],
				$instance['number_of_tags'],
				log_lolla_pro_get_topic_label( 'Topics' ),
				log_lolla_pro_get_link( 'Topics' )
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
		$form .= log_lolla_pro_display_widget_form_label( $this, 'number_of_categories' );
		$form .= '<br/>';
		$form .= log_lolla_pro_display_widget_form_input(
			$this,
			'number_of_categories',
			'number',
			$instance['number_of_categories']
		);
		$form .= '</p>';

		$form .= '<p>';
		$form .= log_lolla_pro_display_widget_form_label( $this, 'number_of_tags' );
		$form .= '<br/>';
		$form .= log_lolla_pro_display_widget_form_input(
			$this,
			'number_of_tags',
			'number',
			$instance['number_of_tags']
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
		$instance = array();

		$instance['number_of_categories'] = ( ! empty( $new_instance['number_of_categories'] ) ) ? filter_var( $new_instance['number_of_categories'], FILTER_SANITIZE_NUMBER_INT ) : '0';
		$instance['number_of_tags']       = ( ! empty( $new_instance['number_of_tags'] ) ) ? filter_var( $new_instance['number_of_tags'], FILTER_SANITIZE_NUMBER_INT ) : '0';

		return $instance;
	}
}

if ( ! function_exists( 'log_lolla_pro_register_topics_widget' ) ) {
	/**
	 * Register the widget.
	 */
	function log_lolla_pro_register_topics_widget() {
		register_widget( 'Log_Lolla_Pro_Topics_Widget' );
	}

	add_action( 'widgets_init', 'log_lolla_pro_register_topics_widget' );
}
