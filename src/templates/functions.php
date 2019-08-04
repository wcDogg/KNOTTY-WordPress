<?php
/**
 * knotty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package knotty
 */


//
// Sets up theme defaults and registers support for various WordPress features.
// 
if ( ! function_exists( 'knotty_setup' ) ) :
	function knotty_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'knotty', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );
		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		// Add excerpts for Page type
		add_post_type_support( 'page', 'excerpt' );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-main' => esc_html__( 'Main Menu', 'knotty' ),
			'menu-mobile-01' => esc_html__( 'Mobile Menu 1', 'knotty' ),
			'menu-mobile-02' => esc_html__( 'Mobile Menu 2', 'knotty' ),
			'menu-mobile-03' => esc_html__( 'Mobile Menu 3', 'knotty' ),
			'menu-mobile-04' => esc_html__( 'Mobile Menu 4', 'knotty' ),			
		) );

		// Output valid HTML5 for search and comments
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'knotty_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'knotty_setup' );


// 
// Remove Supports by Post Type
// 
function knotty_remove_supports() {
	// Replaced with ACF Flexible Content 
	remove_post_type_support( 'post', 'editor' );
	remove_post_type_support( 'page', 'editor' );
}
add_action( 'init', 'knotty_remove_supports' );


// 
// Set the content width in pixels, based on the theme's design and stylesheet.
// @global int $content_width
// 
function knotty_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'knotty_content_width', 840 );
}
add_action( 'after_setup_theme', 'knotty_content_width', 0 );


// 
// Register widget area.
// 
function knotty_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'knotty' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'knotty' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'knotty_widgets_init' );


// 
// knotty Scripts + Styles
// 

// Register
function knotty_register_scripts() {

	wp_register_script( 'knotty-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_register_script( 'sticky-header', get_template_directory_uri() . '/js/StickyHeader.js', array(), '', true );

	wp_register_script( 'aria-prep', get_template_directory_uri() . '/js/AriaModal/AriaModalPrep.js', array(), '', true );
	
	wp_register_script( 'aria-utils', get_template_directory_uri() . '/js/AriaModal/AriaUtils.js', array(), '', true );
	
	wp_register_script( 'aria-modal', get_template_directory_uri() . '/js/AriaModal/AriaModal.js', array(), '', true );	

}
add_action( 'wp_enqueue_scripts', 'knotty_register_scripts' );

// Enqueue 
function knotty_scripts_enqueue() {

	wp_enqueue_script( 'sticky-header' );
	wp_enqueue_script( 'aria-prep' );
	wp_enqueue_script( 'aria-utils' );
	wp_enqueue_script( 'aria-modal' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :
		wp_enqueue_script( 'comment-reply' );
	endif;

	wp_enqueue_style( 'knotty-style', get_stylesheet_uri());

}
add_action( 'wp_enqueue_scripts', 'knotty_scripts_enqueue' );


// 
// Theme enhancements
// 

require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/knotty-social.php';
require get_template_directory() . '/inc/knotty-nav-menu.php';
require get_template_directory() . '/inc/knotty-ga.php';
require get_template_directory() . '/inc/knotty-relevanssi.php';



// 
// Shortcodes
//

function knotty_register_shortcodes() {
   add_shortcode( 'ga_opt_out', 'knotty_ga_opt_out_button' ); 
}

add_action( 'init', 'knotty_register_shortcodes');





// 
// Customizer 
// 
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-header.php';


// 
// knotty Comments
// 

// Custom comments list
require get_template_directory() . '/inc/knotty-comments-list.php';

// Remove "Website" field from form
function remove_cooment_form_fields($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'remove_cooment_form_fields');


// 
// Jetpack compatibility file
//
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }
