<?php

$page_title = get_the_title();
$page_subtitle = get_field('subtitle');
$page_summary = get_field('summary'); 


echo '<section class="section section--header" aria-label="Page header">';
    echo '<div class="section__inner">';

        // if ( has_post_thumbnail() ) :
        //     echo '<div class="page__image">';
        //         the_post_thumbnail( 'full', array(
        //             'alt' => the_title_attribute( array(
        //                 'echo' => false,
        //             ) ),
        //         ) );
        //     echo "</div><!-- .page__image -->";	            
        // endif;   

        echo '<div class="page__title-grid">';
            echo '<div class="page__title-wrap">';
                echo '<h1 class="page__title">'.$page_title.'</h1>';
                if ($page_subtitle) :
                    echo '<h2 class="page__subtitle">'. $page_subtitle .'</h2>';  
                endif; 
            echo '</div>';            
        echo '</div>';  
        
        if ( !is_front_page() ) :
            get_template_part('parts/headers/part', 'share');
        endif;
       
        if ($page_summary) :
            echo '<div class="page__summary">';
                echo $page_summary;
            echo '</div><!-- .page__summary -->';
        endif; 

        if ( is_front_page() ) :
            get_template_part('parts/headers/part', 'filters');	
        endif;

    echo '</div><!-- .sextion__inner -->';
echo '</section><!-- .section--header -->';
    
