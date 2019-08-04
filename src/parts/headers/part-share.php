<?php

$page_shortlink = wp_get_shortlink();
$icon_shortlink = '<i class="fas fa-link"></i>';

echo '<div class="page__share">';

    if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) : 
        ADDTOANY_SHARE_SAVE_KIT();
    endif;

    echo '<nav class="secondary share nav--horizontal nav--icons" aria-label="Short link for this page">';
        echo '<ul role="menu"><li role="none">';
            echo '<a role="menuitem" rel="bookmark" title="Short link for this page" class="link--short" href="'.esc_url($page_shortlink).'" >';
                echo $icon_shortlink;
            echo '</a>';
        echo '</li></ul>';
    echo '</nav><!-- .nav-follow -->';

echo '</div><!-- .page__share -->';