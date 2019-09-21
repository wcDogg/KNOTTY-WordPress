<?php
/**
 * nav-foooter.php
 * 
 * @package knotty
 * @since Knotty 1.0
 */

$args = array(
    'theme_location'  => 'menu-footer',
    'menu_id'         => 'footer-menu',
    'container'       => false,
    'depth'           => 1,
    'fallback_cb'     => false,
); 

if ( has_nav_menu( 'menu-footer' ) ) :

    echo '<nav id="footer-nav" aria-lable="Site Links">';
        wp_nav_menu( $args );  
    echo '</nav><!-- #footer-nav -->';

endif;
