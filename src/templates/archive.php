<?php
/**
 * archive.php
 * Displays categores, tags, and other taxonomies
 * 
 * @package knotty
 * @since Knotty 1.0
 */
?>


<?php get_header(); ?>

<article class="archive">

    <?php 
        get_template_part('parts/archive/header', 'archive');
    ?>
    
    <?php if ( have_posts() ) : ?>

		<section class="section cards cards--multi facetwp-template">	
			<div class="section__inner">				
				<div class="section__cards ">

					<?php while ( have_posts() ) :					
						the_post();	
						get_template_part( 'parts/card/card', get_post_type() );	
                    endwhile; ?>
                    
				</div><!-- .section__cards -->

				<button class="button fwp-load-more">Show More</button>
				
			</div><!-- .section__inner -->
		</section><!-- .section -->
		
	<?php else :
		get_template_part( 'parts/section/section', 'none' );
	endif; ?>

</article><!-- #index  -->

<?php get_footer(); ?>

