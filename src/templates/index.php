 <?php
/**
 * index.php
 * Fallback loop when other templates do not exist
 * 
 * @package knotty
 * @since Knotty 1.0
 */
?>   


<?php get_header(); ?>

<article id="index">
    
    <?php if ( have_posts() ) : ?>

		<section class="section cards cards--multi">	
			<div class="section__inner">				
				<div class="section__cards ">

					<?php while ( have_posts() ) :					
						the_post();	
						get_template_part( 'parts/card/card', get_post_type() );	
                    endwhile; ?>
                    
				</div><!-- .section__cards -->

				<?php get_template_part('parts/archive/nav', 'archive'); ?>			
				
			</div><!-- .section__inner -->
		</section><!-- .section -->
		
	<?php else :
		get_template_part( 'parts/section/section', 'none' );
	endif; ?>

</article><!-- #index  -->

<?php get_footer(); ?>