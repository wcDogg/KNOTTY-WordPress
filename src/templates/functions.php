<?php
/**
 * Theme functions and definitions
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
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-main' => esc_html__( 'Main Menu', 'knotty' ),
			'menu-mobile' => esc_html__( 'Mobile Menu', 'knotty' ),	
			'menu-footer' => esc_html__( 'Footer Menu', 'knotty' ),	
			'menu-popular' => esc_html__( 'Popular Menu', 'knotty' ),
			'menu-follow' => esc_html__( 'Social Menu', 'knotty' ),
		) );	

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );
		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		// Add excerpts for Page type
		add_post_type_support( 'page', 'excerpt' );

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
			'height'      => 48,
			'width'       => 48,
			'flex-width'  => true,
			'flex-height' => true,
		) );

	} //
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
// Register Scripts
// 
function knotty_register_scripts() {

	wp_register_script( 'knotty-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20190908', true );

	wp_register_script( 'polyfill', get_template_directory_uri() . '/js/Polyfill.js', array(), '20190908', true );	

	wp_register_script( 'mobile', get_template_directory_uri() . '/js/MobileMenu.js', array(), '20190908', true );	

} 
add_action( 'wp_enqueue_scripts', 'knotty_register_scripts' );

// 
// Enqueue Scripts
// 
function knotty_scripts_enqueue() {

	wp_enqueue_script( 'polyfill' );
	wp_enqueue_script( 'mobile' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) :
		wp_enqueue_script( 'comment-reply' );
	endif;

	wp_enqueue_style( 'knotty-style', get_stylesheet_uri());

}
add_action( 'wp_enqueue_scripts', 'knotty_scripts_enqueue' );



// 
// Theme Functions
// 
require get_template_directory() . '/inc/theme_classes.php';
require get_template_directory() . '/inc/theme_pingbacks.php';
require get_template_directory() . '/inc/theme_post-meta.php';
require get_template_directory() . '/inc/theme_archive-titles.php';

// 
// Admin
// 
require get_template_directory() . '/inc/admin/theme_admin.php';
// require get_template_directory() . '/inc/admin/theme_social.php';
require get_template_directory() . '/inc/admin/theme_google.php';
require get_template_directory() . '/inc/admin/theme_ga.php';

// 
// Comments
// 
require get_template_directory() . '/inc/theme_comment-list.php';
require get_template_directory() . '/inc/theme_comment-form.php';

// 
// Plugin Support
// 
require get_template_directory() . '/inc/plugs/theme_relevanssi.php';

// 
// WP Customizer 
// 
require get_template_directory() . '/inc/theme_customizer.php';
require get_template_directory() . '/inc/theme_custom-header.php';







// 
// Set the content width in pixels, based on the theme's design and stylesheet.
// @global int $content_width
// 
// function knotty_content_width() {
// 	// This variable is intended to be overruled from themes.
// 	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
// 	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
// 	$GLOBALS['content_width'] = apply_filters( 'knotty_content_width', 840 );
// }
// add_action( 'after_setup_theme', 'knotty_content_width', 0 );


// 
// Register widget area.
// 
// function knotty_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'knotty' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => esc_html__( 'Add widgets here.', 'knotty' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h2 class="widget-title">',
// 		'after_title'   => '</h2>',
// 	) );
// }
// add_action( 'widgets_init', 'knotty_widgets_init' );

