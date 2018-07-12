<?php
/**
 * The source code of the Archives by date widget.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

/**
 * The Archives by date Widget.
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */
class Log_Lolla_Pro_Archives_By_Date_Widget extends WP_Widget {
	/**
	 * Register Widget
	 */
	public function __construct() {
		parent::__construct(
			'log_lolla_pro_archives_by_date_widget',
			esc_html__( 'Log Lolla Pro Archives by date' ),
			array(
				'description' => __( 'Display archives of years and months', 'log_lolla_pro' ),
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
			log_lolla_pro_get_archive_list_by_year_and_months_as_html(
				log_lolla_pro_get_archive_label( 'Archives by date' ),
				log_lolla_pro_get_link( 'Archives by date' )
			)
		);
	}

	/**
	 * Display widget on the backend
	 *
	 * @param  array $instance The widget instance.
	 */
	public function form( $instance ) {
		echo wp_kses_post( log_lolla_pro_display_widget_form_no_settings_message() );
	}

	/**
	 * Process widget options to be saved
	 *
	 * @param  array $new_instance The new widget instance.
	 * @param  array $old_instance The old widget instance.
	 */
	public function update( $new_instance, $old_instance ) {
		// Nothing to process.
	}
}
add_action(
	'widgets_init', function() {
		register_widget( 'Log_Lolla_Pro_Archives_By_Date_Widget' );
	}
);
