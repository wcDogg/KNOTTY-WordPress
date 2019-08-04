<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>

<?php

    $page_summary = get_field('summary'); 

    get_template_part('parts/headers/part', 'card-thumb');

    echo '<header class="card__header">';
        get_template_part('parts/headers/part', 'card-title');
    echo '</header>';

    if ( $page_summary ) :
        echo '<main class="card__main">';
            echo $page_summary;
        echo '</main>';
    endif;

?>

</article><!-- .card -->