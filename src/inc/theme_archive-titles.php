<?php
/**
 * theme_archive-titles.php
 * Removes the word 'Archive' from titles
 *
 * @package knotty
 * @since Knotty 1.0
 */

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

