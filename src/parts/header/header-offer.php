<?php
/**
 * header-offer.php
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

<section class="section header header--offer">
    <div class="header__inner">

        <?php get_template_part('parts/header/part', 'offer-meta'); ?>

        <div class="header__title-wrap">
            <h1 class="header__title"><?php echo $page_title ?></h1>
            <?php if ($page_subtitle) : ?>
                <h2 class="header__subtitle"><?php echo $page_subtitle ?></h2>
            <?php endif; ?>
        </div>

        <?php if ($page_summary) : ?>
            <div class="header__summary">
                <?php echo $page_summary; ?>
            </div><!-- .header__summary -->  
        <?php endif; ?>

        <div class="header__action">
            <?php
            echo '<a class="button button--offer" rel="nofollow nonopener" data-google="offer" title="Shop offer" href="'.esc_url($url_offer).'" >'.$icon_offer, $text_offer.'</a>'; 
            ?>
        </div>

        <?php get_template_part('parts/header/part', 'share'); ?>

    </div><!-- .section__inner -->
</section><!-- .section.header-->