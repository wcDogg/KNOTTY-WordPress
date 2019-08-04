<?php
// @see /inc/knotty-globals.php

$page_title = get_the_title();
$page_subtitle = get_field('subtitle');
$page_summary = get_field('summary'); 
$page_categories = the_category( '&nbsp;&bull;&nbsp;' );

echo '<section class="section section--header" aria-label="Page header">';
   echo '<div class="section__inner">';

        if ( has_category() ) :
            echo '<div class="page__meta">';

                echo '<span class="meta meta--categories">';
                    // the_terms( get_the_ID(), 'category', '', ', ' );
                    echo $page_categories;
                echo '</span>';	
                
                echo '<span> class="meta meta--date">';
                    knotty_posted_on();
                echo '</span>';
                        
            echo '</div><!-- .page__meta -->';
        endif;          

        echo '<div class="page__title-wrap">';
            echo '<h1 class="page__title">'.$page_title.'</h1>';
            if ($page_subtitle) :
                echo '<h2 class="page__subtitle">'. $page_subtitle .'</h2>';  
            endif; 
        echo '</div><!-- .page__title-wrap -->';

        if ( has_post_thumbnail() ) :
            echo '<div class="page__image">';
                the_post_thumbnail( 'medium_large', array(
                    'alt' => the_title_attribute( array(
                        'echo' => false,
                    ) ),
                ) );
            echo "</div><!-- .page__image -->";	            
        endif;

        get_template_part('parts/headers/part', 'share');

        if ($page_summary) :
            echo '<div class="section__inner">';
                echo '<div class="page__summary">';
                    echo $page_summary;
                echo '</div><!-- .page__summary -->';
            echo '</div><!-- .section__inner -->';
        endif; 

    echo '</div><!-- .section__inner  -->';
echo '</section><!-- .section--header -->'; 