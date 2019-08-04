<?php 

// @see Admin > Settings > Social URLs
// @see /inc/knott-social.php

$icon_amazon = '<i class="fab fa-amazon"></i>';
$social_url_amazon = get_option('social_amazon');

$icon_etsy = '<i class="fab fa-etsy"></i>';
$social_url_etsy = get_option('social_etsy');   

$icon_github = '<i class="fab fa-github"></i>';
$social_url_github = get_option('social_github');

$icon_codepen = '<i class="fab fa-codepen"></i>';
$social_url_codepen = get_option('social_codepen');

$icon_jsfiddle = '<i class="fab fa-jsfiddle"></i>';
$social_url_jsfiddle = get_option('social_jsfiddle');

$icon_linkedin = '<i class="fab fa-linkedin-in"></i>';
$social_url_linkedin = get_option('social_linkedin');

$icon_fb = '<i class="fab fa-facebook-f"></i>';
$social_url_fb = get_option('social_fb');

$icon_twitter = '<i class="fab fa-twitter"></i>';
$social_url_twitter = get_option('social_twitter');

$icon_yt = '<i class="fab fa-youtube"></i>';
$social_url_yt = get_option('social_yt');

$icon_pinterest = '<i class="fab fa-pinterest-p"></i>';
$social_url_pinterest = get_option('social_pinterest');

$icon_instagram = '<i class="fab fa-instagram"></i>';
$social_url_instagram = get_option('social_pinterest');


echo '<nav class="follow nav--horizontal nav--icons" aria-label="Follow us on social media">';
    echo '<ul role="menu">';

        if ( $social_url_amazon ) :
            echo '<li role="none">';
                echo '<a href="'.esc_url($social_url_amazon).'" role="menuitem" title="Support via Amazon" class="link--follow">';
                    echo $icon_amazon;
                echo '</a>';
            echo '</li>'; 
        endif;

        if ( $social_url_etsy ) :
            echo '<li role="none">';
                echo '<a href="'.esc_url($social_url_etsy).'" role="menuitem" title="Me on Etsy" class="link--follow">';
                    echo $icon_etsy;
                echo '</a>';
            echo '</li>'; 
        endif;

        if ( $social_url_github ) :
            echo '<li role="none">';
                echo '<a href="'.esc_url($social_url_github).'" role="menuitem" title="Me on GitHub" class="link--follow">';
                    echo $icon_github;
                echo '</a>';
            echo '</li>'; 
        endif;

        if ( $social_url_codepen ) :
            echo '<li role="none">';
                echo '<a href="'.esc_url($social_url_codepen).'" role="menuitem" title="Me on CodePen" class="link--follow">';
                    echo $icon_codepen;
                echo '</a>';
            echo '</li>'; 
        endif;

        if ( $social_url_jsfiddle ) : 
            echo '<li role="none">';
                echo '<a href="'.esc_url($social_url_jsfiddle).'" role="menuitem" title="Me on JSFiddle" class="link--follow">';
                    echo $icon_jsfiddle;
                echo '</a>';
            echo '</li>'; 
        endif;

        if ( $social_url_linkedin ) :
            echo '<li role="none">';
                echo '<a href="'.esc_url($social_url_linkedin).'" role="menuitem" title="Me on LinkedIn" class="link--follow">';
                    echo $icon_linkedin;
                echo '</a>';
            echo '</li>'; 
        endif;

        if ( $social_url_fb ) :
            echo '<li role="none">';
                echo '<a href="'.esc_url($social_url_fb).'" role="menuitem" title="Me on Facebook" class="link--follow">';
                    echo $icon_fb;
                echo '</a>';
            echo '</li>'; 
        endif;

        if ( $social_url_twitter ) :
            echo '<li role="none">';
                echo '<a href="'.esc_url($social_url_twitter).'" role="menuitem" title="Me on Twitter" class="link--follow">';
                    echo $icon_twitter;
                echo '</a>';
            echo '</li>'; 
        endif;

        if ( $social_url_yt ) :
            echo '<li role="none">';
                echo '<a href="'.esc_url($social_url_yt).'" role="menuitem" title="Me on YouTube" class="link--follow">';
                    echo $icon_yt;
                echo '</a>';
            echo '</li>'; 
        endif;

        if ( $social_url_pinterest ) :
            echo '<li role="none">';
                echo '<a href="'.esc_url($social_url_pinterest).'" role="menuitem" title="Me on Pinterest" class="link--follow">';
                    echo $icon_pinterest;
                echo '</a>';
            echo '</li>'; 
        endif;

        if ( $social_url_instagram ) :
            echo '<li role="none">';
                echo '<a href="'.esc_url($social_url_instagram).'" role="menuitem" title="Me on Instagram" class="link--follow">';
                    echo $icon_instagram;
                echo '</a>';
            echo '</li>';     
        endif;

    echo '</ul>';
echo '</nav><!-- .nav-follow -->';

