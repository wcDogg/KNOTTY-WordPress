<?php
/**
 * Theme Admin - Google
 * Add Admin > Knotty Settings menu
 *
 * @package knotty
 * @since Knotty 1.0
 */


// -----------------------------------------------------
// Add Admin > Knotty Settings > Google
// wp-admin/admin.php?page=knotty-settings-google
// -----------------------------------------------------

if( is_admin() ) :
    add_action('admin_menu', 'knotty_settings_google_admin_menu');
endif;

function knotty_settings_google_admin_menu() {    
    add_submenu_page( 
        'knotty-settings', 
        'Knotty Settings: Google', 
        'Google',
        'manage_options', 
        'knotty-settings-google',
        'knotty_settings_google_page'
    );
} //


// -----------------------------------------------------
// $function to display Admin > Knotty Settings pages
// -----------------------------------------------------

function knotty_settings_google_page() {
    echo '<div class="wrap">';   
        echo '<h2>Knotty Settings: Google</h2>';
    echo '</div><!-- .wrap -->';
} //