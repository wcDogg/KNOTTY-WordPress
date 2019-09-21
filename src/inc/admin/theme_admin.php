<?php
/**
 * theme_admin.php
 * Add Admin > Knotty Settings menu
 *
 * @package knotty
 * @since Knotty 1.0
 */

// -----------------------------------------------------
// Duplicate top-level parent when adding sub-pages
// https://developer.wordpress.org/reference/functions/add_submenu_page/#comment-446   
// -----------------------------------------------------

if( is_admin() ) :
    add_action('admin_menu', 'knotty_settings_admin_menu');
endif;

function knotty_settings_admin_menu() {

    // Add: wp-admin/admin.php?page=knotty-settings
    add_menu_page(
        'Knotty Settings',         // $page_title (browser tab, not screen)
        'Knotty Settings',         // $menu_title
        'manage_options',          // $capability
        'knotty-settings',         // $menu_slug
        '',                        // $function set on add_submenu_page()
        'dashicons-admin-generic', // $icon_url
        90                         // $position
    );

    // Duplicate + display: wp-admin/admin.php?page=knotty-settings
    add_submenu_page( 
        'knotty-settings',      // $parent_slug = $menu_slug of add_menu_page()
        'Knotty Settings',      // $page_title of add_menu_page()
        'Knotty Settings',      // $menu_title of add_menu_page()
        'manage_options',       // $capability of add_menu_page()
        'knotty-settings',      // $menu_slug = $menu_slug of add_menu_page()
        'knotty_settings_page'  // $function to display page
    );
    
}


// -----------------------------------------------------
// $function to display Admin > Knotty Settings pages
// -----------------------------------------------------
function knotty_settings_page() {
    echo '<div class="wrap">';   

        echo '<h2>Knotty Settings</h2>';

        echo '<h3><a href=" '.esc_url( admin_url('admin.php?page=knotty-settings-social', 'https') ).' ">Social Menu</a></h3>';
        
        echo '<h3><a href=" '.esc_url( admin_url('admin.php?page=knotty-settings-google', 'https') ).' ">Google</a></h3>';
        
    echo '</div><!-- .wrap -->';
} //