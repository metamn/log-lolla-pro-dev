<?php
/**
 * Adds unique features for this theme.
 *
 * This is a WordPress standard `functions.php` file containing the default functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Log_Lolla_Pro
 * @since 1.0.0
 */

if ( ! function_exists( 'log_lolla_pro_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the `after_setup_theme` hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function log_lolla_pro_setup() {
		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Log Lolla Pro, use a find and replace
		 * to change 'log-lolla-pro' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'log-lolla-pro', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
			/* translators: The primary menu name */
			'menu-1' => esc_html_x( 'Primary', 'The primary menu name', 'log-lolla-pro' ),
		) );

		/**
		 * Switch default core markup for search form, comment form, and comments to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/**
		 * Set up the WordPress core custom background feature.
		 */
		add_theme_support( 'custom-background', apply_filters( 'log_lolla_pro_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		/**
		 * Add theme support for selective refresh for widgets.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add theme support for post formats.
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

		/**
		 * Add theme support for styling the editor.
		 */
		add_editor_style();

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'log_lolla_pro_setup' );


/**
 * Register widget area.
 *
 * Registers widget areas for `Header Menu` and `Sidebar`.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function log_lolla_pro_widgets_init() {
	register_sidebar( array(
		/* translators: The name of the Header Menu widget area */
		'name'          => esc_html_x( 'Header Menu', 'The name of the Header Menu widget area', 'log-lolla-pro' ),
		'id'            => 'sidebar-2',
		/* translators: The description of the Header Menu widget area */
		'description'   => esc_html_x( 'Add widgets here.', 'The description of the Header Menu widget area', 'log-lolla-pro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		/* translators: The name of the Sidebar widget area */
		'name'          => esc_html_x( 'Sidebar', 'The name of the Sidebar widget area', 'log-lolla-pro' ),
		'id'            => 'sidebar-1',
		/* translators: The description of the Sidebar widget area */
		'description'   => esc_html_x( 'Add widgets here.', 'The description of the Sidebar widget area', 'log-lolla-pro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'log_lolla_pro_widgets_init' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function log_lolla_pro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'log_lolla_pro_content_width', 640 );
}
add_action( 'after_setup_theme', 'log_lolla_pro_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function log_lolla_pro_scripts() {
	$timestamp = filemtime( get_template_directory() . '/style.css' );
	wp_enqueue_style( 'log-lolla-pro-style', get_stylesheet_uri(), array(), $timestamp );

	wp_enqueue_script( 'jquery' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$timestamp = filemtime( get_template_directory() . '/assets/js/log-lolla-pro.js' );
	wp_enqueue_script( 'log-lolla-pro', get_theme_file_uri( '/assets/js/log-lolla-pro.js' ), array(), $timestamp );
}
add_action( 'wp_enqueue_scripts', 'log_lolla_pro_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';


/**
 * Load custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Load functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Load customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Load custom widgets
 */
require get_template_directory() . '/inc/custom-widgets.php';


/**
 * Load custom post types
 */
require get_template_directory() . '/inc/custom-post-types.php';


/**
 * Load custom shortcodes
 */
require get_template_directory() . '/inc/custom-shortcodes.php';
