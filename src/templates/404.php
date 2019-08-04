<?php

get_header();

echo '<article class="error-404">';

	echo '<section class="section section--header">';
		echo '<div class="section__inner">';
		
			echo '<div class="page__title-grid">';
				echo '<div class="page__title-wrap">';
					echo '<h1 class="page__title">404</h1>';
					echo '<h2 class="page__subtitle">Oops! Page Not Found.</h2>';				
				echo '</div><!-- .page__title-wrap -->';
			echo '</div><!-- .page__title-grid -->';

			echo '<p class="big">It\'s probably our fault - we recently renovated and are still cleaning up. How about searching?</p>';
			// form.search-form
			get_search_form();	
			
		echo '</div><!-- .section__innter -->';
	echo '</section><!-- .section--header -->';

echo '</article><!-- #post-'.esc_html( get_the_ID() ).' -->';

get_footer();
