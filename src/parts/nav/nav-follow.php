<?php 

// @see Admin > Settings > Social URLs
// @see /inc/knott-social.php


if ( function_exists('knotty_social') ) :
    
    // Get the URLs
    $social_amazon = get_option('social_amazon');
    $social_etsy = get_option('social_etsy');   
    $social_github = get_option('social_github');
    $social_codepen = get_option('social_codepen');
    $social_jsfiddle = get_option('social_jsfiddle');
    $social_linkedin = get_option('social_linkedin');
    $social_fb = get_option('social_fb');
    $social_twitter = get_option('social_twitter');
    $social_yt = get_option('social_yt');
    $social_pinterest = get_option('social_pinterest');
    $social_instagram = get_option('social_instagram');

    // Check for URLs before getting icons and making <nav>
    if ( $social_amazon || $social_etsy || $social_github || $social_codepen || $social_jsfiddle || $social_linkedin || $social_fb || $social_twitter || $social_yt || $social_pinterest || $social_instagram ) :  

        // Get the nav classes
        $social_class_nav = get_option('social_class_nav');
        $social_class_ul = get_option('social_class_ul');
        $social_class_li = get_option('social_class_li');
        $social_class_a = get_option('social_class_a');
        // Get the icons
        $social_amazon_icon = get_option('social_amazon_icon', '<i class="fab fa-amazon"></i>');
        $social_etsy_icon = get_option('social_etsy_icon', '<i class="fab fa-etsy"></i>'); 
        $social_github_icon = get_option('social_github_icon', '<i class="fab fa-github"></i>');
        $social_codepen_icon = get_option('social_codepen_icon', '<i class="fab fa-codepen"></i>');
        $social_jsfiddle_icon = get_option('social_jsfiddle_icon', '<i class="fab fa-jsfiddle"></i>');
        $social_linkedin_icon = get_option('social_linkedin_icon', '<i class="fab fa-linkedin-in"></i>');
        $social_fb_icon = get_option('social_fb_icon', '<i class="fab fa-facebook-f"></i>');
        $social_twitter_icon = get_option('social_twitter_icon', '<i class="fab fa-twitter"></i>');
        $social_yt_icon = get_option('social_yt_icon', '<i class="fab fa-youtube"></i>');
        $social_pinterest_icon = get_option('social_pinterest_icon', '<i class="fab fa-pinterest-p"></i>');
        $social_instagram_icon = get_option('social_instagram_icon', '<i class="fab fa-instagram"></i>');  


        echo '<nav class="'.esc_attr($social_class_nav).'" aria-label="Follow us on social media">';
            echo '<ul role="menu" class="' .esc_attr($social_class_ul). '">';
        
                if ( $social_amazon ) :
                    echo '<li role="none" class="'.esc_attr($social_class_li).'">';
                        echo '<a href="'.esc_url($social_amazon).'" role="menuitem" title="Support via Amazon" class="'.esc_attr($social_class_a).'">';
                            echo $social_amazon_icon;
                        echo '</a>';
                    echo '</li>'; 
                endif;

                if ( $social_etsy ) :
                    echo '<li role="none" class="'.esc_attr($social_class_li).'">';
                        echo '<a href="'.esc_url($social_etsy).'" role="menuitem" title="Me on Etsy" class="'.esc_attr($social_class_a).'">';
                            echo $social_etsy_icon;
                        echo '</a>';
                    echo '</li>'; 
                endif;

                if ( $social_github ) :
                    echo '<li role="none" class="'.esc_attr($social_class_li).'">';
                        echo '<a href="'.esc_url($social_github).'" role="menuitem" title="Me on GitHub" class="'.esc_attr($social_class_a).'">';
                            echo $social_github_icon;
                        echo '</a>';
                    echo '</li>'; 
                endif;

                if ( $social_codepen ) :
                    echo '<li role="none" class="'.esc_attr($social_class_li).'">';
                        echo '<a href="'.esc_url($social_codepen).'" role="menuitem" title="Me on CodePen" class="'.esc_attr($social_class_a).'">';
                            echo $social_codepen_icon;
                        echo '</a>';
                    echo '</li>'; 
                endif;

                if ( $social_jsfiddle ) : 
                    echo '<li role="none" class="'.esc_attr($social_class_li).'">';
                        echo '<a href="'.esc_url($social_jsfiddle).'" role="menuitem" title="Me on JSFiddle" class="'.esc_attr($social_class_a).'">';
                            echo $social_jsfiddle_icon;
                        echo '</a>';
                    echo '</li>'; 
                endif;

                if ( $social_linkedin ) :
                    echo '<li role="none" class="'.esc_attr($social_class_li).'">';
                        echo '<a href="'.esc_url($social_linkedin).'" role="menuitem" title="Me on LinkedIn" class="'.esc_attr($social_class_a).'">';
                            echo $social_linkedin_icon;
                        echo '</a>';
                    echo '</li>'; 
                endif; 

                if ( $social_fb ) :
                    echo '<li role="none" class="'.esc_attr($social_class_li).'">';
                        echo '<a href="'.esc_url($social_fb).'" role="menuitem" title="Me on Facebook" class="'.esc_attr($social_class_a).'">';
                            echo $social_fb_icon;
                        echo '</a>';
                    echo '</li>'; 
                endif;

                if ( $social_twitter ) :
                    echo '<li role="none" class="'.esc_attr($social_class_li).'">';
                        echo '<a href="'.esc_url($social_twitter).'" role="menuitem" title="Me on Twitter" class="'.esc_attr($social_class_a).'">';
                            echo $social_twitter_icon;
                        echo '</a>';
                    echo '</li>'; 
                endif;

                if ( $social_yt ) :
                    echo '<li role="none" class="'.esc_attr($social_class_li).'">';
                        echo '<a href="'.esc_url($social_yt).'" role="menuitem" title="Me on YouTube" class="'.esc_attr($social_class_a).'">';
                            echo $social_yt_icon;
                        echo '</a>';
                    echo '</li>'; 
                endif;

                if ( $social_pinterest ) :
                    echo '<li role="none" class="'.esc_attr($social_class_li).'">';
                        echo '<a href="'.esc_url($social_pinterest).'" role="menuitem" title="Me on Pinterest" class="'.esc_attr($social_class_a).'">';
                            echo $social_pinterest_icon;
                        echo '</a>';
                    echo '</li>'; 
                endif;

                if ( $social_instagram ) :
                    echo '<li role="none" class="'.esc_attr($social_class_li).'">';
                        echo '<a href="'.esc_url($social_instagram).'" role="menuitem" title="Me on Instagram" class="'.esc_attr($social_class_a).'">';
                            echo $social_instagram_icon;
                        echo '</a>';
                    echo '</li>';     
                endif;


            echo '</ul>';
        echo '</nav>';

    endif;
endif; 

