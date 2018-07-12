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
			'Log Lolla Pro ' . log_lolla_pro_get_post_format_label( 'POst Formats' ),
			array(
				/* translators: The Post Formats widget description on the admin screen */
				'description' => esc_html__( 'Display post formats archive', 'log_lolla_pro' ),
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
			log_lolla_pro_get_post_format_list_with_post_count_as_html(
				log_lolla_pro_get_post_format_label( 'Post Formats' ),
				log_lolla_pro_get_link( 'Post Formats' )
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
		register_widget( 'Log_Lolla_Pro_Post_Formats_Widget' );
	}
);
