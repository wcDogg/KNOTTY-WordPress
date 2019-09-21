<?php
/**
 * nav-archive.php
 * Displays pagination for archives
 * 
 * @package knotty
 * @since Knotty 1.0
 */

$icon_next = '<i class="fas fa-chevron-right"></i>';
$icon_prev = '<i class="fas fa-chevron-left"></i>';

the_posts_pagination(array( 
    'mid_size' => 2,
    'prev_text' => __( $icon_prev, 'knotty' ),
    'next_text' => __( $icon_next, 'knotty' ),
    'screen_reader_text' => __( 'Achive Navigation', 'knotty' ),
)); 

