<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package knotty
 */

$upload_dir = wp_upload_dir();
$img_search = $upload_dir['url'] . '/page_search.jpg';


get_header();

echo '<article class="search">';

	echo '<section class="section section--header">';
		echo '<div class="section__inner">';

			echo '<div class="page__title-grid">';
				echo '<div class="page__title-wrap">';
					echo '<h1 class="page__title">Search</h1>';
				echo '</div><!-- .page__title-wrap -->';
			echo '</div><!-- page__title-grid -->';			

			get_search_form();

			if ( !have_posts() ) :
				echo '<p class="big">Oops! No results.</p>';
			endif;

		echo '</div><!-- .section__inner -->';
	echo '</section><!-- .section--header -->';

	if ( have_posts() ) : 

		echo '<section class="section section--cards">';	
			echo '<div class="section__inner">';
				echo '<div class="section__grid">';			
					/* Start the Loop */
					while ( have_posts() ) :					
						the_post();	
						get_template_part( 'parts/card', get_post_type() );	
					endwhile;
				echo '</div><!-- .section__grid -->';

				get_template_part('parts/nav/nav', 'archive');

			echo '</div><!-- .section__inner -->';
		echo '</section><!-- .section -->';	
		
	else :
		
		echo '<section class="section">';	
			echo '<div class="section__inner">';					
				?>
				<div class="section__iframe">
					<iframe src="https://www.youtube.com/embed/lr0T1g-KmpI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<?php
			echo '</div><!-- .section__inner -->';
		echo '</section><!-- .section -->';	

	endif;

echo '</article><!-- #post-'.esc_html( get_the_ID() ).' -->';

get_footer();

