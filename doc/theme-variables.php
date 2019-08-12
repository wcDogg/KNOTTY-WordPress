<?php


// Background image
$upload_dir = wp_upload_dir();
$img_home = $upload_dir['baseurl'] . '/bg_home.jpg';


// Posts & Pages

$page_title = get_the_title();
$page_subtitle = get_field('subtitle');
$page_summary = get_field('summary'); 
knotty_posted_on();
$page_categories = the_category( '&nbsp;&bull;&nbsp;' );
$page_tags = the_tags( '', '&nbsp;&bull;&nbsp;' );
$page_permalink = get_the_permalink();
$page_shortlink = wp_get_shortlink();
$page_content_flex = have_rows('flex_content');
$page_content_wp = get_the_content();


// Archives

$tax = get_queried_object(); 
$tax_title = get_the_archive_title();
$tax_subtitle = get_field('subtitle', $tax);
$tax_description = get_the_archive_description($tax);
$tax_image;
$tax_icon;


// Social URLs & Icons

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



// Page Meta Icons

the_category( '&nbsp;&bull;&nbsp;' );
the_tags( '', '&nbsp;&bull;&nbsp;' );

$icon_categories = '<i class="fas fa-th-large"></i>';
$icon_tags = '<i class="fas fa-hashtag"></i>';  
$icon_shortlink = '<i class="fas fa-link"></i>';


// Navigation Icons
$icon_next = '<i class="fas fa-chevron-right"></i>';
$icon_prev = '<i class="fas fa-chevron-left"></i>';

