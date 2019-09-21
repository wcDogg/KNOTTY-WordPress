 <?php
/**
 * front-page.php
 * 
 * 
 * @package knotty
 * @since Knotty 1.0
 */


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

?>


<?php get_header(); ?>

<article class="home">

    <section class="section header header--home">

        <div class="overlay__wrap">

            <div class="overlay"></div>

            <div class="header__title-wrap overlay__content">
                <h1 class="header__title">knotty.earth</h1>
                <h2 class="header__subtitle">diversified geekdom</h2>
            </div>     
            
        </div><!-- .overlay__wrap -->
	
		<div class="header__inner">
			<?php get_template_part('parts/archive/part', 'filters'); ?>
		</div><!-- .header__inner -->
		
    </section><!-- .header -->
    
    <?php  if ( $custom_query->have_posts() ) :  ?>

		<section class="section cards cards--multi facetwp-template">	
			<div class="section__inner">				
				<div class="section__cards ">

					<?php while ( $custom_query->have_posts() ) : 
						$custom_query->the_post(); 
						get_template_part( 'parts/card/card', get_post_type() );
					endwhile; ?>
                    
				</div><!-- .section__cards -->

				<button class="button fwp-load-more">Show More</button>
				
			</div><!-- .section__inner -->
		</section><!-- .section -->
		
	<?php 

		else :
			get_template_part( 'parts/section/section', 'none' );
		endif;
		
		wp_reset_query();

	?>

</article><!-- #index  -->

<?php get_footer(); ?>