<?php
/**
 * theme_pingbacks.php
 * Add a pingback url auto-discovery header for 
 * single posts, pages, or attachments.
 * 
 * @package knotty
 * @since Knotty 1.0
 */


function knotty_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'knotty_pingback_header' );

