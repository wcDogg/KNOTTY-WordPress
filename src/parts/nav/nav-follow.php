<?php
/**
 * nav-follow.php
 * 
 * @package knotty
 * @since Knotty 1.0
 */


echo '<nav class="follow-nav" aria-lable="Follow on Social Media">';

    if( wp_get_nav_menu_name('menu-follow')  ) :  

        $args = array(
            'theme_location'  => 'menu-follow',
            'menu_class'      => 'follow-menu',
            'container'       => false,
            'depth'           => 1,
            'fallback_cb'     => false,
        );

        wp_nav_menu( $args ); 

    endif;	
    
echo '</nav><!-- .follow-nav -->';
