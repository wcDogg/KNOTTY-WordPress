<?php
/**
 * card-page.php
 * Displays single page card
 * 
 * @package knotty
 * @since Knotty 1.0
 */

$page_excerpt = get_the_excerpt();
$page_summary = get_field('summary'); // knotty
// $page_summary = get_field('page_summary');  // knotty

?>

<div class="card card--page">

    <?php get_template_part('parts/card/part', 'card-thumb'); ?>

    <div class="card__header">
          <?php get_template_part('parts/card/part', 'card-title'); ?>    
    </div>

    <div class="card__main">
        <div class="card__text">
            <?php 
                if ($page_summary) :
                    echo $page_summary;
                else :
                    echo $page_excerpt;
                endif;          
            ?>
        </div>
    </div>

</div><!-- .card -->