<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package knotty
 */


// 
// Archive Titles
// 

if ( ! function_exists( 'knotty_archive_title' ) ) :
	function knotty_archive_title( $title ) {
		if ( is_category() ) :
			$title = single_cat_title( '', false );
		elseif ( is_tag() ) :
			$title = single_tag_title( '', false );
		elseif ( is_author() ) :
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		elseif ( is_post_type_archive() ) :
			$title = post_type_archive_title( '', false );
		elseif ( is_tax() ) :
			$title = single_term_title( '', false );
		endif;
		
		return $title;
	}
	add_filter( 'get_the_archive_title', 'knotty_archive_title' );
endif;


// 
// Prints HTML with meta information for the current post-date/time.
// 

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


//
// Prints HTML with meta information for the current author.
// 

if ( ! function_exists( 'knotty_posted_by' ) ) :

	function knotty_posted_by() {
		$byline = sprintf(
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="meta meta--byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;
