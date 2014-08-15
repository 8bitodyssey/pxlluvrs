<?php
/**
 * pxlluvrs functions and definitions
 *
 * @package pxlluvrs
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'pxl_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pxl_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on pxlluvrs, use a find and replace
	 * to change 'pxl' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'pxl', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pxl' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'pxl_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // pxl_setup
add_action( 'after_setup_theme', 'pxl_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function pxl_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'pxl' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'pxl_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pxl_scripts() {
	wp_enqueue_style(
		'pxl-style',
		get_stylesheet_directory_uri() . '/style.css',
		array(),
		'20140622'
	);

	wp_enqueue_script(
		'pxl-navigation',
		get_template_directory_uri() . '/js/navigation.js',
		array(),
		'20140622',
		true
	);

	wp_enqueue_script(
		'pxl-skip-link-focus-fix',
		get_template_directory_uri() . '/js/skip-link-focus-fix.js',
		array(),
		'20140622',
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script(
		'pxl-script',
		get_stylesheet_directory_uri() . '/js/pxlluvrs.min.js',
		array('jquery'),
		'20140622',
		true
	);

  // Foundation
  $foundation_version = '5.3';
	// Modernizr acts as a shim for HTML5 elements for older browsers as well as detection for mobile devices.
	wp_enqueue_script( 'custom.modernizr', get_template_directory_uri() . '/bower_components/modernizr/modernizr.js', array(), $foundation_version );

	// or individually
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/bower_components/foundation/js/foundation.js', array('jquery'), $foundation_version, true );
	// foundation4 alert
	// wp_enqueue_script( 'foundation.alerts', get_template_directory_uri() . '/bower_components/foundation/js/foundation.alerts.js', array( 'foundation' ), $foundation_version, true );
	// foundation4 clearing
	// wp_enqueue_script( 'foundation.clearing', get_template_directory_uri() . '/bower_components/foundation/js/foundation.clearing.js', array( 'foundation' ), $foundation_version, true );
  // foundation4 cookie
  // wp_enqueue_script( 'foundation.cookie', get_template_directory_uri() . '/bower_components/foundation/js/foundation.cookie.js', array( 'foundation' ), $foundation_version, true );
	// foundation4 dropdown
	// wp_enqueue_script( 'foundation.dropdown', get_template_directory_uri() . '/bower_components/foundation/js/foundation.dropdown.js', array( 'foundation' ), $foundation_version, true );
	// foundation4 forms
	// wp_enqueue_script( 'foundation.forms', get_template_directory_uri() . '/bower_components/foundation/js/foundation.forms.js', array( 'foundation' ), $foundation_version, true );
	// foundation4 Interchange
	// wp_enqueue_script( 'foundation.interchange', get_template_directory_uri() . '/bower_components/foundation/js/foundation.interchange.js', array( 'foundation' ), $foundation_version, true );
	// foundation4 joyride
	// wp_enqueue_script( 'foundation.joyride', get_template_directory_uri() . '/bower_components/foundation/js/foundation.joyride.js', array( 'foundation' ), $foundation_version, true );
	// foundation4 magellan
	// wp_enqueue_script( 'foundation.magellan', get_template_directory_uri() . '/bower_components/foundation/js/foundation.magellan.js', array( 'foundation' ), $foundation_version, true );
	// foundation4 orbit
	// wp_enqueue_script( 'foundation.orbit', get_template_directory_uri() . '/bower_components/foundation/js/foundation.orbit.js', array( 'foundation' ), $foundation_version, true );
	// foundation4 placeholder
	// wp_enqueue_script( 'foundation.placeholder', get_template_directory_uri() . '/bower_components/foundation/js/foundation.placeholder.js', array( 'foundation' ), $foundation_version, true );
	// foundation4 reveal
	// wp_enqueue_script( 'foundation.reveal', get_template_directory_uri() . '/bower_components/foundation/js/foundation.reveal.js', array( 'foundation' ), $foundation_version, true );
	// foundation4 section
	// wp_enqueue_script( 'foundation.section', get_template_directory_uri() . '/bower_components/foundation/js/foundation.section.js', array( 'foundation' ), $foundation_version, true );
	// foundation4 tooltips
	// wp_enqueue_script( 'foundation.tooltips', get_template_directory_uri() . '/bower_components/foundation/js/foundation.tooltips.js', array( 'foundation' ), $foundation_version, true );
	// foundation4 topbar
	wp_enqueue_script( 'foundation.topbar', get_template_directory_uri() . '/bower_components/foundation/js/foundation.topbar.js', array( 'foundation' ), $foundation_version, true );
}
add_action( 'wp_enqueue_scripts', 'pxl_scripts' );

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

/***
* Extend default get_search_form();
*/

function pxl_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="'.home_url( '/' ).'" >
		<div class="row collapse">
	    <div class="large-8 small-9 columns"><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
	    	<input type="text" value="' . get_search_query() . '" name="s" id="s" class="radius" placeholder="'. __('Keyword?' , 'pxl') .'" />
			</div>
			<div class="large-4 small-3 columns">
	    	<input type="submit" id="searchsubmit" class="top-bar-pxl-searchsubmit radius" value="'. esc_attr__('Search' , 'pxl') .'" />
			</div>
		</div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'pxl_search_form' );
