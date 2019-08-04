<?php

$tax = get_queried_object(); 
$tax_title = get_the_archive_title();
$tax_subtitle = get_field('subtitle', $tax);
$tax_description = get_the_archive_description($tax);
$tax_image;
$tax_icon;


echo '<section class="section section--header aria-label="Page header">';
    echo '<div class="section__inner">';

        echo '<div class="page__title-grid">';
            echo '<div class="page__title-wrap">';
                echo '<h1 class="page__title">'.$tax_title.'</h1>';
                if ($tax_subtitle) :
                    echo '<h2 class="page__subtitle">'.$tax_subtitle.'</h2>';
                endif;            
            echo '</div><!-- .page__title-wrap -->';        
        echo '</div><!-- .page__title-grid -->';              
   
        if ( $tax_description ) :
            echo '<div class="page__summary">';
                echo $tax_description;
            echo '</div><!-- .page__summary -->';
        endif;	  

        get_template_part('parts/headers/part', 'filters');	

    echo '</div><!-- section--inner -->';
echo '</section><!-- .section--header -->';

