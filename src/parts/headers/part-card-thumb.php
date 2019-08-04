<?php

echo '<a class="card__image" aria-hidden="true" tabindex="-1" href="'.esc_url(get_the_permalink()).'">';
    the_post_thumbnail( 'thumbnail', array(
        'alt' => the_title_attribute( array(
            'echo' => false,
        ) ),
    ) );
echo '</a><!-- .card__image -->';	


	
