<?php
/**
 * part-share.php
 * 
 * @package knotty
 * @since Knotty 1.0
 */

$page_shortlink = wp_get_shortlink();
$icon_shortlink = '<i class="fas fa-link"></i>';

?>

<div class="header__share-wrap">
    
    <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) : ?>
        <div class="header__share">
            <?php ADDTOANY_SHARE_SAVE_KIT(); ?>
        </div>
    <?php endif; ?>

    <div class="header__short">
        <a class="shortlink" rel="bookmark" aria-label="Short page URL" title="Short page URL" href="<?php esc_url($page_shortlink) ?>"><?php echo $icon_shortlink ?></a>
    </div>

</div><!-- .header__share-wrap -->