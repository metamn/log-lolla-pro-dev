<?php
/**
 * Custom widgets.
 *
 * @link https://developer.wordpress.org/themes/functionality/widgets/
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

/**
 * Including custom widget classes.
 */
require get_template_directory() . '/inc/custom-widgets/class-log-lolla-pro-sources-widget.php';
require get_template_directory() . '/inc/custom-widgets/class-log-lolla-pro-post-formats-widget.php';
require get_template_directory() . '/inc/custom-widgets/class-log-lolla-pro-people-widget.php';
require get_template_directory() . '/inc/custom-widgets/class-log-lolla-pro-topics-widget.php';
require get_template_directory() . '/inc/custom-widgets/class-log-lolla-pro-topics-summary-widget.php';
require get_template_directory() . '/inc/custom-widgets/class-log-lolla-pro-archives-widget.php';

/**
 * Custom widget helpers.
 */
if ( ! function_exists( 'log_lolla_pro_display_widget' ) ) {
	/**
	 * Display a widget
	 * It will be displayed as a shortcode
	 *
	 * @param  string $title   Widget title.
	 * @param  string $content Widget content, HTML.
	 * @return string          HTML
	 */
	function log_lolla_pro_display_widget( $title, $content ) {
		return log_lolla_pro_display_shortcode( $title, $content );
	}
}

if ( ! function_exists( 'log_lolla_pro_display_widget_form_no_settings_message' ) ) {
	/**
	 * Displays a message when there are no ptions to set for a widget
	 *
	 * @return string HTML
	 */
	function log_lolla_pro_display_widget_form_no_settings_message() {
		$html  = '<p>';
		$html .= esc_html__( 'There are no options to set for this widget', 'log-lolla-pro' );
		$html .= '</p>';

		return $html;
	}
}

if ( ! function_exists( 'log_lolla_pro_display_widget_form_input' ) ) {
	/**
	 * Display an input field for the widget form
	 *
	 * @param  OBJECT $that         The widget instance (ie. $this).
	 * @param  string $field_id     The field id.
	 * @param  string $input_type   The type of the input.
	 * @param  string $input_value  The default value of the input.
	 * @return string               HTML
	 */
	function log_lolla_pro_display_widget_form_input( $that, $field_id, $input_type = 'text', $input_value = '' ) {
		if ( empty( $that ) ) {
			return;
		}
		if ( empty( $field_id ) ) {
			return;
		}

		$input_id   = esc_attr( $that->get_field_id( $field_id ) );
		$input_name = esc_attr( $that->get_field_name( $field_id ) );

		$html = '<input id="' . $input_id . '" name="' . $input_name . '" type="' . $input_type . '" value="' . $input_value . '">';

		return $html;
	}
}

if ( ! function_exists( 'log_lolla_pro_display_widget_form_label' ) ) {
	/**
	 * Display a label for the widget form
	 *
	 * @param  OBJECT $that     The widget instance (ie. $this).
	 * @param  string $field_id The field id.
	 * @return string           HTML
	 */
	function log_lolla_pro_display_widget_form_label( $that, $field_id ) {
		if ( empty( $that ) ) {
			return;
		}
		if ( empty( $field_id ) ) {
			return;
		}

		$html  = '<label for="' . esc_attr( $that->get_field_id( $field_id ) ) . '">';
		$html .= esc_html( $that->widget_options[ $field_id ] );
		$html .= '</label>';

		return $html;
	}
}
