<?php
/**
 * part-card-title.php
 * Displays linked post title + subtitle
 * 
 * @package knotty
 * @since Knotty 1.0
 */

$page_title = get_the_title();
$page_subtitle = get_field('subtitle'); // knotty
// $page_subtitle = get_field('page_subtitle'); // knotty
$page_permalink = get_the_permalink();


echo '<a class="card__title-wrap" rel="bookmark" title="'.esc_attr($page_title).'" href="'.esc_url($page_permalink).'">';
    echo '<h1 class="card__title">'.$page_title.'</h1>';
    if ($page_subtitle) :
        echo '<h2 class="card__subtitle">'. $page_subtitle .'</h2>';  
    endif; 				
echo "</a><!-- .card__title-wrap -->";	