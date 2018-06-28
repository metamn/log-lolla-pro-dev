<?php
/**
 * The Sources widget
 *
 * @link https://developer.wordpress.org/themes/functionality/widgets/
 *
 * @package Log_Lolla_Pro
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
	 * @param  [type] $args     [description]
	 * @param  [type] $instance [description]
	 * @return [type]           [description]
	 */
	public function widget( $args, $instance ) {
		extract( $args );

		$title   = apply_filters( 'widget_title', esc_html__( 'Sources' ) );
		$content = log_lolla_pro_display_popular_posts_of_post_type(
			'source',
			$instance['number_of_sources'],
			'post count'
		);

		if ( ! empty( $content ) ) {
			echo $before_widget;
			echo log_lolla_pro_display_widget( $title, $content );
			echo $after_widget;
		}
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
		$form .= log_lolla_pro_display_widget_form_label( $this, 'number_of_sources' );
		$form .= log_lolla_pro_display_widget_form_input(
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




 /**
  * The Post Formats widget
  */
class Log_Lolla_Pro_Post_Formats_Widget extends WP_Widget {
	 /**
	  * Register Widget
	  */
	public function __construct() {
		parent::__construct(
			'log_lolla_pro_post_formats_widget',
			esc_html__( 'Log Lolla Pro Post Formats', 'log-lolla-pro' ),
			array(
				'description' => esc_html__( 'Display post formats archive', 'log_lolla_pro' ),
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

		$title   = apply_filters( 'widget_title', esc_html__( 'Post Formats' ) );
		$content = log_lolla_pro_display_post_formats_with_post_count();

		if ( ! empty( $content ) ) {
			echo $before_widget;
			echo log_lolla_pro_display_widget( $title, $content );
			echo $after_widget;
		}
	}

	 /**
	  * Display widget on the backend
	  *
	  * @param  [type] $instance [description]
	  * @return [type]           [description]
	  */
	public function form( $instance ) {
		echo log_lolla_pro_display_widget_form_no_settings_message();
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
	add_action(
		'widgets_init', function() {
			register_widget( 'Log_Lolla_Pro_Post_Formats_Widget' );
		}
	);



	/**
	 * The People widget
	 */
	class Log_Lolla_Pro_People_Widget extends WP_Widget {
		/**
		 * Register Widget
		 */
		public function __construct() {
			parent::__construct(
				'log_lolla_pro_people_widget',
				esc_html__( 'Log Lolla Pro People', 'log-lolla-pro' ),
				array(
					'description'      => esc_html__( 'Display most popular people', 'log_lolla_pro' ),
					'number_of_people' => esc_html__( 'Number of people to display', 'log_lolla_pro' ),
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

			$title   = apply_filters( 'widget_title', esc_html__( 'People' ) );
			$content = log_lolla_pro_display_popular_posts_of_post_type( 'people', $instance['number_of_people'] );

			if ( ! empty( $content ) ) {
				echo $before_widget;
				echo log_lolla_pro_display_widget( $title, $content );
				echo $after_widget;
			}
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

			$form .= log_lolla_pro_display_widget_form_label( $this, 'number_of_people' );
			$form .= log_lolla_pro_display_widget_form_input(
				$this,
				'number_of_people',
				'number',
				$instance['number_of_people']
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

			$instance['number_of_people'] = ( ! empty( $new_instance['number_of_people'] ) ) ? filter_var( $new_instance['number_of_people'], FILTER_SANITIZE_NUMBER_INT ) : '0';

			return $instance;
		}
	}
	add_action(
		'widgets_init', function() {
			register_widget( 'Log_Lolla_Pro_People_Widget' );
		}
	);



	/**
	 * The Topics widget
	 */
	class Log_Lolla_Pro_Topics_Widget extends WP_Widget {
		/**
		 * Register Widget
		 */
		public function __construct() {
			parent::__construct(
				'log_lolla_pro_topics_widget',
				esc_html__( 'Log Lolla Pro Topics', 'log-lolla-pro' ),
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
		 * @param  [type] $args     [description]
		 * @param  [type] $instance [description]
		 * @return [type]           [description]
		 */
		public function widget( $args, $instance ) {
			extract( $args );

			$title   = apply_filters( 'widget_title', esc_html__( 'Topics' ) );
			$content = log_lolla_pro_get_topics_with_sparklines(
				10,
				$instance['number_of_categories'],
				$instance['number_of_tags']
			);

			if ( ! empty( $content ) ) {
				echo $before_widget;
				echo log_lolla_pro_display_widget( $title, $content );
				echo $after_widget;
			}
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



	/**
	 * The Site description widget
	 */
	class Log_Lolla_Pro_Topics_Summary_Widget extends WP_Widget {
		/**
		 * Register Widget
		 */
		public function __construct() {
			parent::__construct(
				'log_lolla_pro_topics_summary_widget',
				esc_html__( 'Log Lolla Pro Topics Summary', 'log-lolla-pro' ),
				array(
					'description'          => __( 'Display a short summary based on main topics', 'log_lolla_pro' ),
					'number_of_categories' => esc_html__( 'Number of categories to use', 'log_lolla_pro' ),
					'number_of_tags'       => esc_html__( 'Number of tags to use', 'log_lolla_pro' ),
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

			$title   = apply_filters( 'widget_title', '' );
			$content = log_lolla_pro_get_topics_summary_as_html(
				$instance['number_of_categories'],
				$instance['number_of_tags']
			);

			if ( ! empty( $content ) ) {
				echo $before_widget;
				echo log_lolla_pro_display_widget( $title, $content );
				echo $after_widget;
			}
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
			$form .= esc_html__( 'A description will be generated by merging the most popular category and tag descriptions', 'log-lolla-pro' );
			$form .= '</p>';

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

			$instance['number_of_categories'] = ( ! empty( $new_instance['number_of_categories'] ) ) ? filter_var( $new_instance['number_of_categories'], FILTER_SANITIZE_NUMBER_INT ) : '0';
			$instance['number_of_tags']       = ( ! empty( $new_instance['number_of_tags'] ) ) ? filter_var( $new_instance['number_of_tags'], FILTER_SANITIZE_NUMBER_INT ) : '0';

			return $instance;
		}
	}
	add_action(
		'widgets_init', function() {
			register_widget( 'Log_Lolla_Pro_Topics_Summary_Widget' );
		}
	);



	/**
	 * The Archives widget
	 */
	class Log_Lolla_Pro_Archives_Widget extends WP_Widget {
		/**
		 * Register Widget
		 */
		public function __construct() {
			parent::__construct(
				'log_lolla_pro_archives_widget',
				esc_html__( 'Log Lolla Pro Archives', 'log-lolla-pro' ),
				array(
					'description' => __( 'Display archives of years and months', 'log_lolla_pro' ),
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

			$title   = apply_filters( 'widget_title', esc_html__( 'Archives by date', 'log-lolla-pro' ) );
			$content = log_lolla_pro_display_archive_list_by_year_and_months();

			if ( ! empty( $content ) ) {
				echo $before_widget;
				echo log_lolla_pro_display_widget( $title, $content );
				echo $after_widget;
			}
		}

		/**
		 * Display widget on the backend
		 *
		 * @param  [type] $instance [description]
		 * @return [type]           [description]
		 */
		public function form( $instance ) {
			echo log_lolla_pro_display_widget_form_no_settings_message();
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
	add_action(
		'widgets_init', function() {
			register_widget( 'Log_Lolla_Pro_Archives_Widget' );
		}
	);




	/**
	 * Widget helpers
	 */


	if ( ! function_exists( 'log_lolla_pro_display_widget' ) ) {
		/**
		 * Display a widget
		 * It will be displayed as a shortcode
		 *
		 * @param  string $title   Widget title
		 * @param  string $content Widget content, HTML
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
		 * @return [type] [description]
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
		 * @param  OBJECT $that         The widget instance (ie. $this)
		 * @param  string $field_id     The field id
		 * @param  string $input_type   The type of the input
		 * @param  string $input_value  The default value of the input
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
		 * @param  OBJECT $that     The widget instance (ie. $this)
		 * @param  string $field_id The field id
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
			$html .= esc_attr__( $that->widget_options[ $field_id ] );
			$html .= '</label>';

			return $html;
		}
	}
