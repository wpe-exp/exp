<?php
/**
 * _s functions and definitions
 *
 * @package _s
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'exp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function exp_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'exp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Extra image sizes.
	 */
	set_post_thumbnail_size( 360, 180, true );
	add_image_size( 'thumb340x340', 340, 340, true );
	add_image_size( 'thumb360x180', 360, 180, true );
	add_image_size( 'thumb680x680', 680, 680, true );
	add_image_size( 'thumb640x280', 640, 280, true );
	add_image_size( 'thumb940x400', 940, 400, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'global_nav' => __( 'Global Menu', 'exp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'exp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // exp_setup
add_action( 'after_setup_theme', 'exp_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function exp_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'exp' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'exp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function exp_scripts() {

  if( is_admin() ) return;

  // stylesheets
  wp_enqueue_style( 'app', get_stylesheet_directory_uri() . '/assets/css/app.css' );

  // javascripts
  wp_deregister_script( 'jquery' );
  wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array() );
  wp_enqueue_script( 'bundle', get_stylesheet_directory_uri() . '/assets/js/bundle.js', array( 'jquery' ), true );

  if (  is_singular( 'post' ) ) {
  	wp_enqueue_script( 'hljs', get_template_directory_uri() . '/bower_components/highlightjs/highlight.pack.js', array( 'jquery' ) );
  	wp_enqueue_style( 'hlcss', get_template_directory_uri() . '/bower_components/highlightjs/styles/zenburn.css', array( 'app' ) );
  }

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'exp_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load own file: class register customtypes.
 */
require get_template_directory() . '/inc/class_register-customtypes.php';

/**
 * Load own file: my-functions.
 */
require get_template_directory() . '/inc/exp-functions.php';
