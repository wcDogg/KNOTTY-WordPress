<?php
// @see /inc/knotty-globals.php

$page_title = get_the_title();
$page_subtitle = get_field('subtitle');
$page_permalink = get_the_permalink();

echo '<a class="card__title-wrap" rel="bookmark" title="'.esc_attr($page_title).'" href="'.esc_url($page_permalink).'">';
    echo '<h1 class="page__title">'.$page_title.'</h1>';
    if ($page_subtitle) :
        echo '<h2 class="page__subtitle">'. $page_subtitle .'</h2>';  
    endif; 				
echo "</a><!-- .card__title-wrap -->";	