<?php
/**
 * nav-main.php
 * 
 * @package knotty
 * @since Knotty 1.0
 */

echo '<nav id="main-nav" aria-lable="Quick Links">';

    if( wp_get_nav_menu_name('menu-main')  ) :  

        $args = array(
            'theme_location'  => 'menu-main',
            'menu_id'         => 'main-menu',
            'container'       => false,
            'depth'           => 1,
            'fallback_cb'     => false,
        );

        wp_nav_menu( $args ); 

    endif;	
    
echo '</nav><!-- #main-nav -->';
