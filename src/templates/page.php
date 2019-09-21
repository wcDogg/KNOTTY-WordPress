<?php
/**
 * page.php
 * Displays single site pages
 * 
 * @package knotty
 * @since Knotty 1.0
 */


get_header(); 

while ( have_posts() ) :

	the_post();
	get_template_part( 'parts/content', 'page' );

endwhile; // End of the loop.

get_footer(); 