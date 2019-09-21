<?php
/**
 * single.php
 * Displays single posts and custom post types
 * 
 * @package knotty
 * @since Knotty 1.0
 */


get_header(); 

while ( have_posts() ) :

	the_post();
	get_template_part( 'parts/content', get_post_type() );
	// the_post_navigation();

endwhile; // End of the loop.

get_footer(); 