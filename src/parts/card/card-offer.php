<?php
/**
 * card-offer.php
 * Displays single offer card
 * 
 * @package knotty
 * @since Knotty 1.0
 */

$page_title = get_the_title();
$page_subtitle = get_field('page_subtitle');
$page_summary = get_field('page_summary'); 

$url_offer = get_field('buy_offer_url');
$text_offer = get_field('buy_offer_text');
$icon_offer = get_field('buy_offer_icon');

?>

<div class="card card--offer">

    <div class="card__header">

        <?php get_template_part('parts/header/part', 'offer-meta'); ?>

        <div class="card__title-wrap">
            <h1 class="card__title"><?php echo $page_title ?></h1>
            <?php if ($page_subtitle) : ?>
                <h2 class="card__subtitle"><?php echo $page_subtitle ?></h2>
            <?php endif; ?>
        </div>

    </div><!-- .card__header -->

    <div class="card__main">
       
        <?php if ($page_summary) : ?>
            <div class="card__text">
                <div class="header__summary">
                    <?php echo $page_summary; ?>
                </div><!-- .header__summary -->  
            </div>
        <?php endif; ?>
        
        <div class="card__action">
            <?php echo '<a class="button button--offer" rel="nofollow nonopener" data-google="offer" title="Shop offer" href="'.esc_url($url_offer).'" >'.$icon_offer, $text_offer.'</a>'; ?>
        </div>
        
    </div><!-- .card__main -->

</div><!-- .card -->