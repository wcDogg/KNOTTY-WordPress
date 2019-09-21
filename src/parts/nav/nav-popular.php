<?php
/**
 * nav-popular.php
 * 
 * @package knotty
 * @since Knotty 1.0
 */


echo '<nav id="popular-nav" aria-lable="Popular Links">';

    if( wp_get_nav_menu_name('menu-popular')  ) :  

        $args = array(
            'theme_location'  => 'menu-popular',
            'menu_id'         => 'popular-menu',
            'container'       => false,
            'depth'           => 1,
            'fallback_cb'     => false,
        );

        wp_nav_menu( $args ); 

    endif;
    
echo '</nav><!-- #popular-nav -->';
