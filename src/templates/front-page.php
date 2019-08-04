<?php

 // Protect against arbitrary paged values
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$args = array( 
	'post_type' => 'post',
	// Optimize - only get the needed fields. Note this is plural 'ids'.
	'fields' => 'ids',
	// Optimize - don't cache the query
	'cache_results'  => false,
	'update_post_meta_cache' => false, 
	'update_post_term_cache' => false, 
	// Set number of posts to display per page
	// Feeds max_num_pages calc
	'posts_per_page' => 10,	
    'paged' => $paged,
 	// Enable FacetWP 
	'facetwp' => true,    
);

// Must be $query for navigation to work
$custom_query = new WP_Query( $args );


get_header();

echo '<article id="post-'.esc_attr( get_the_ID() ).'>" class="home landing">';

	get_template_part('parts/headers/header', get_post_type() );
	
    if ( $custom_query->have_posts() ) : 
		
		echo '<section class="section section--cards facetwp-template">';	
			echo '<div class="section__inner">';
			                
				echo '<div class="section__grid">';	

					while ( $custom_query->have_posts() ) : 

						$custom_query->the_post(); 
						get_template_part( 'parts/card', get_post_type() );
											
					endwhile;

                echo '</div><!-- .section__grid -->';
                
                echo '<button class="button fwp-load-more">Show More</button>';

			echo '</div><!-- .section__inner -->';
		echo '</section><!-- .section -->';	
		
	else :
		get_template_part( 'parts/content', 'none' );
	endif;

	wp_reset_query();

echo '</article><!-- #post-'.esc_html( get_the_ID() ).' -->';

get_footer();