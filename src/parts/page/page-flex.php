<?php

// check if the flexible content field has rows of data
if( have_rows('flex_content') ):

     // loop through the main flex
    while ( have_rows('flex_content') ) : the_row();

        if( get_row_layout() == 'section' ):

            $section_class = get_sub_field('section_class');
            $section_title = get_sub_field('section_title');
            $section_subtitle = get_sub_field('section_subtitle');
 
            if ( $section_class ) :
                echo '<section class="section '.esc_attr($section_class).'">'; 
            else :
                echo '<section class="section">'; 
            endif;    

                echo '<div class="section__inner">';

                    if ($section_title) : 
                        echo '<h1 class="section__title">'.$section_title.'</h1>';  
                    endif;

                    if ( $section_subtitle ) :
                        echo '<h2 class="section__subtitle">'.$section_subtitle.'</h2>';
                    endif;       
                  
                    // loop through the section flex
                    while ( have_rows('section_flex') ) : the_row();

                        if( get_row_layout() == 'flex_text' ):  

                            echo '<div class="section__content">';
                                the_sub_field('section_text');
                            echo '</div>';    

                        elseif( get_row_layout() == 'flex_gist' ): 

                            echo '<div class="section__gist">';
                                the_sub_field('section_gist');
                            echo '</div>';

                        elseif( get_row_layout() == 'flex_gallery' ):  

                            $shortcode = get_sub_field('section_gallery');
                            // no wrapper div here
                            echo do_shortcode( $shortcode ); 

                        elseif( get_row_layout() == 'flex_shortcode' ):  

                            $shortcode = get_sub_field('section_shortcode');
                            // no wrapper div here
                            echo do_shortcode( $shortcode );                                                      
                        elseif( get_row_layout() == 'flex_list' ): 

                            echo '<div class="section__content">';
                                if( have_rows('section_list') ): 
                                    echo '<div class="list">';
                                        while ( have_rows('section_list') ) : the_row();
                                            the_sub_field('list_item_icon'); 
                                            echo '<div class="list__item-text">';      
                                                the_sub_field('list_item_text');  
                                            echo '</div>';
                                        endwhile;
                                    echo '</div><!-- .list -->';
                                endif;                        
                            echo '</div>'; 

                        elseif( get_row_layout() == 'flex_table' ): 

                            $table = get_sub_field('section_table');

                            if ( $table ) :
                                echo '<div class="section__table">'; 

                                        echo '<table class="table">';     

            
                                        if ( ! empty( $table['caption'] ) ) :
                                            echo '<caption>' . $table['caption'] . '</caption>';
                                        endif;

                                        if ( ! empty( $table['header'] ) ) :
                                            echo '<thead>';
                                                echo '<tr>';
                                                    foreach ( $table['header'] as $th ) :
                                                        echo '<th>';
                                                            echo $th['c'];
                                                        echo '</th>';
                                                    endforeach;
                                                echo '</tr>';
                                            echo '</thead>';
                                        endif;

                                        echo '<tbody>';
                                            foreach ( $table['body'] as $tr ) :
                                                echo '<tr>';
                                                    foreach ( $tr as $td ) :
                                                        echo '<td>';
                                                            echo $td['c'];
                                                        echo '</td>';
                                                    endforeach;
                                                echo '</tr>';
                                            endforeach;
                                        echo '</tbody>';

                                    echo '</table>';
                                echo '</div><!-- .section__table -->';
                            endif;                            
          
                        elseif( get_row_layout() == 'flex_files' ): 

                            while ( have_rows('section_files') ) : the_row();

                                $file = get_sub_field('file');
                                $url = $file['url'];
                                $icon = $file['icon'];
                                $title = $file['title'];
                                $caption = $file['caption'];

                                echo '<div class="section__file">';   

                                    echo '<a href="'.esc_url($url).'" title="'.esc_attr($title).'">';
                                        echo '<img class="file__icon" src="'.esc_attr($icon).'" />';
                                        echo $title;
                                    echo '</a>';

                                    if ($caption) :
                                        echo '<p>'.$caption.'</p>';         
                                    endif;

                                echo '</div>';

                            endwhile;
                                                                
                        elseif( get_row_layout() == 'flex_yt' ): 

                            $url_tail = get_sub_field('section_yt');
                            
                            echo '<div class="section__iframe">';
                                echo '<iframe src="https://www.youtube.com/embed/'.$url_tail.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            echo '</div>';                                
                        
                        elseif( get_row_layout() == 'flex_mp4' ):  

                            $src = get_sub_field('section_mp4');

                            echo '<div class="section__mp4">';
                                echo '<video controls><source src="'.esc_url($src).'"></video>';
                            echo '</div>';        

                        elseif( get_row_layout() == 'flex_image' ):

                            $image = get_sub_field('section_image');
                            $large = $image['sizes'][ 'large' ];
                            $url = $image['url'];
                            $title = $image['title'];
                            // $alt = $image['alt'];
                            $caption = $image['caption'];

                            echo '<figure class="section__image">';
                                echo '<img src="'.esc_url($large).'" alt="'.esc_attr($title).'"/>';

                                if ( $title || $caption ) :
                                    echo '<figcaption>';
                                        if ( $title ) :               
                                            echo '<strong>'.$title.'</strong>';
                                        endif;

                                        if ( $title && $caption ):
                                            echo ':&nbsp;';
                                        endif;

                                        if ( $caption ) :               
                                            echo '<span>'.$caption.'</span>';
                                        endif;
                                    echo '</figcaption>';
                                endif;
                            echo '</figure>';        

                        elseif( get_row_layout() == 'flex_giphy' ):

                            echo '<div class="section__giphy">';
                                $url = get_sub_field('section_giphy');
                                echo $url;
                            echo '</div>';      

                        endif;   
                
                    endwhile;              

                echo '</div><!-- .section__inner -->';
            echo '</section><!-- .section -->';

        endif;
    // end main flex loop;
    endwhile;
    
else :

    get_template_part('parts/content', 'none');
    
endif;    