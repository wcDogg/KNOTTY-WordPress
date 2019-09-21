<?php
/**
 * part-card-thumb.php
 * Displays linked post thumbail
 * 
 * @package knotty
 * @since Knotty 1.0
 */

echo '<a class="card__image-wrap" aria-hidden="true" tabindex="-1" href="'.esc_url(get_the_permalink()).'">';

    if ( has_post_thumbnail() ) :
        the_post_thumbnail( 'thumbnail', array(
            'alt' => the_title_attribute( array(
                'echo' => false,
            ) ),
        ) ); 
    endif;   

echo '</a><!-- .card__image-wrap -->';	
