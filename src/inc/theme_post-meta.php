<?php
/**
 * theme_post-meta.php
 * Prints post + Author Meta
 *
 * @package knotty
 * @since Knotty 1.0
 */


// Current Post 
if ( ! function_exists( 'knotty_posted_on' ) ) :

	function knotty_posted_on() {
		
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) :
			$time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
		else : 
			$time_string = '<time class="published" datetime="%1$s">%2$s</time>';
		endif;

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		echo $time_string;
	}
endif;


// Current Author
if ( ! function_exists( 'knotty_posted_by' ) ) :

	function knotty_posted_by() {
		$byline = sprintf(
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="meta meta--byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

