<?php

// 
// Filter wp_nav_menu()
// 

// Article : Three ways to change classes for wp_nav_menu()
// - Custom Walker Class
// - Filters
// - Custom Function 
// - https://stackoverflow.com/questions/52829782/adding-active-class-to-current-post-ancestor-menu-item-parent-in-wordpress

// Set default arguments for we_nav_manu()
// These can be overriden per menu.
// https://codex.wordpress.org/Plugin_API/Filter_Reference/wp_nav_menu_args
// https://developer.wordpress.org/reference/functions/wp_nav_menu/

function knotty_nav_menu_args( $args ) {
	// Remove the default <div> wrapper
	$args['container'] = false;	
	// Set menu depth
	$args['depth'] = 1;
	// Don't fallback to the first non-empty menu
	$args['fallback_cb'] = false;
	// Set default <ul class="nav">
	$args['menu_class'] = 'nav__list';

	return $args;
}
add_filter( 'wp_nav_menu_args', 'knotty_nav_menu_args' );


// Remove most of the default <li> classes
// Leave clases/arrays necessary for adding 'active' class in subsequent filter
// https://wordpress.stackexchange.com/a/30425

function knotty_nav_menu_item_class_remove($classes, $item) {
    $classes = array_filter( 
        $classes, 
        create_function( '$class', 
			'return in_array( $class, 
				array( "current-menu-item", "current-menu-parent", ) );' 
		)
	);

    return array_merge(
        $classes,
		(array)get_post_meta( $item->ID, '_menu_item_classes', true )
	);
}
add_filter('nav_menu_css_class', 'knotty_nav_menu_item_class_remove', 10, 2);


// Replace default <li class="menu-item"> with custom class
// Return <li class="nav__item">
// https://wordpress.stackexchange.com/a/245525

function knotty_nav_menu_item_class( $classes, $item, $args, $depth ) {
	// unset($classes); 
	$classes[] = 'nav__item';
	return $classes;
}
add_filter( 'nav_menu_css_class', 'knotty_nav_menu_item_class', 10, 4 );


// Append 'active' class to <li>
// Returns <li class="nav__item active">
// https://wordpress.stackexchange.com/a/112958

function knotty_nav_menu_item_active ($classes, $item) {

	// if( in_array( 'current-menu-item', $classes ) ||
	// 	in_array( 'current-menu-parent', $classes ) ||
	// 	in_array( 'current-menu-ancestor', $classes ) ||
	// 	in_array( 'current_page_item', $classes ) ||
	// 	in_array( 'current_page_parent', $classes ) ||
	// 	in_array( 'current_page_ancestor', $classes ) 
	// ) :

	// Target only the classes/arrays left after 
	// knotty_nav_menu_item_class_remove()
	if( in_array( 'current-menu-item', $classes ) ||
		in_array( 'current-menu-parent', $classes ) 
	) :

		$classes[] = 'active';

	endif;	

  	return $classes; 
}
add_filter('nav_menu_css_class' , 'knotty_nav_menu_item_active' , 10 , 2);


// Add a custom class to the <a> - there are no defualt classes here.
// Returns <li class="nav__item"><a class="nav__link">
// https://developer.wordpress.org/reference/hooks/nav_menu_link_attributes/

function knotty_nav_menu_link_class($atts, $item, $args) {

	$atts['class'] = 'nav__link';

    return $atts;
}
add_filter('nav_menu_link_attributes', 'knotty_nav_menu_link_class', 1, 3);


// Add 'active' class to <a>
// Returns <li class="nav__item active"><a class="nav__link active">
// https://stackoverflow.com/a/44587727
function knotty_nav_menu_link_active( $classes, $item ) {

	if ( in_array( 'current_page_item', $item->classes ) ) :
        $classes['class'] = 'nav__link active';
	endif;

    return $classes;
}
add_filter( 'nav_menu_link_attributes', 'knotty_nav_menu_link_active', 10, 2 );