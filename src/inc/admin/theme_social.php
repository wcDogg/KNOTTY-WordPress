<?php
/**
 * Theme Admin - Social
 * Add Admin > Knotty Settings > Social 
 *
 * @package knotty
 * @since Knotty 1.0
 */


// -----------------------------------------------------
// Hooks
// -----------------------------------------------------
if( is_admin() ) :
    
    add_action( 'admin_menu', 'knotty_settings_social_admin_menu' );
    add_action( 'admin_init', 'knotty_settings_social_sections' );
    add_action( 'admin_init', 'knotty_settings_social_register' );
    add_action( 'admin_init', 'knotty_settings_social_fields' );

endif;


// -----------------------------------------------------
// Add + display: wp-admin/admin.php?page=knotty-settings-social
// Admin > Knotty Settings > Social
// -----------------------------------------------------
function knotty_settings_social_admin_menu() {  
    add_submenu_page( 
        'knotty-settings',            // $parent_slug = $menu_slug of add_menu_page() - separate file
        'Knotty Settings: Social',    // $page_title (browser tab, not screen)
        'Social',                     // $menu_title
        'manage_options',             // $capability
        'knotty-settings-social',     // $menu_slug
        'knotty_settings_social_page' // $function to display page
    );
} // 


// $function to display Admin > Knotty Settings > Social page
function knotty_settings_social_page() { 
    echo '<div class="wrap">';   
        echo '<h2>Knotty Settings: Social</h2>';
		echo '<form method="post" action="options.php">';
            do_settings_sections('knotty-settings-social'); // $menu_slug of add_submenu_page()
            settings_fields( 'social-settings'); // the collection of settings
            submit_button();
        echo '</form>';      
    echo '</div><!-- .wrap -->';   
} //


// -----------------------------------------------------
// Add sections to Social page
// -----------------------------------------------------
function knotty_settings_social_sections() {

    // CSS section
    add_settings_section(
        'social-css',              // $id of this section
        'SOCIAL CSS',              // $title of this section
        'knotty_social_css_intro', // $callback to display intro content for section
        'knotty-settings-social'   // $page = $menu_slug of add_submenu_page() 
    );

    // URLs section
    add_settings_section(
        'social-urls',              
        'SOCIAL URLs',             
        'knotty_social_urls_intro',
        'knotty-settings-social'   
    );    

    // Add section
    add_settings_section(
        'social-icons',            
        'SOCIAL ICONS',             
        'knotty_social_icons_intro', 
        'knotty-settings-social' 
    );       

    // $callback for CSS section intro
    function knotty_social_css_intro() {
        echo '<p>The Social Menu structure is nav : ul : li : a. Here you can add theme-specific CSS classes for these tags.</p>';
    }

    // $callback for URLs section intro
    function knotty_social_urls_intro() {
        echo '<p>Enter the URLs for the platforms you want to display in the Social Menu.</p>';
    }

    // $callback for Icons section intro
    function knotty_social_icons_intro() {
        echo '<p>The Soical Menu uses Font Awesome 5 Free icons by default. Here you can override indvidual icons.</p>';
    }  

} // 


// -----------------------------------------------------
// Register Soical settings
// -----------------------------------------------------
function knotty_settings_social_register() {

    // CSS
     $args = array(
        'type' => 'string', 
        'sanitize_callback' => 'sanitize_text_field',
    );   

    register_setting(
        'social-settings',  // $option_group = $id of add_settings_section()
        'social_class_nav', // $option_name = $id of add_setting_field()
        $args
    );

    register_setting( 'social-settings', 'social_class_ul', $args );    
    register_setting( 'social-settings', 'social_class_li', $args );      
    register_setting( 'social-settings', 'social_class_a', $args );     

    // URLs
    $args = array(
        'type' => 'string', 
        'sanitize_callback' => 'esc_url_raw',
    );   

    register_setting( 'social-settings', 'social_amazon', $argc );
    register_setting( 'social-settings', 'social_etsy', $args );
    register_setting( 'social-settings', 'social_github', $args ); 
    register_setting( 'social-settings', 'social_codepen', $args ); 
    register_setting( 'social-settings', 'social_jsfiddle', $args );     
    register_setting( 'social-settings', 'social_linkedin', $args );
    register_setting( 'social-settings', 'social_fb', $args );
    register_setting( 'social-settings', 'social_twitter', $args );
    register_setting( 'social-settings', 'social_yt', $args );
    register_setting( 'social-settings', 'social_pinterest', $args );
    register_setting( 'social-settings', 'social_instagram', $args );	

    // Icons
    $args = array(
        'type' => 'string', 
        'sanitize_callback' => 'wp_kses_post',
    );

    register_setting( 'social-settings', 'social_amazon_icon', $argc );
    register_setting( 'social-settings', 'social_etsy_icon', $args );
    register_setting( 'social-settings', 'social_github_icon', $args ); 
    register_setting( 'social-settings', 'social_codepen_icon', $args ); 
    register_setting( 'social-settings', 'social_jsfiddle_icon', $args );     
    register_setting( 'social-settings', 'social_linkedin_icon', $args );
    register_setting( 'social-settings', 'social_fb_icon', $args );
    register_setting( 'social-settings', 'social_twitter_icon', $args );
    register_setting( 'social-settings', 'social_yt_icon', $args );
    register_setting( 'social-settings', 'social_pinterest_icon', $args );
    register_setting( 'social-settings', 'social_instagram_icon', $args );	


} //


// ------------------------------------------------------
// Add Social Settings
// ------------------------------------------------------
function knotty_settings_social_fields() {

    // CSS
    add_settings_field(
        'social_class_nav',         // $id for this field
        'CSS NAV class',            // $title for this field
        'display_social_class_nav', // $callback to echo input for this setting
        'knotty-settings-social',   // $page = $menu_slug of add_submenu_page()
        'social-css'                // $section = $id of add_settings_section() 
    );

    add_settings_field(
        'social_class_ul', 
        'CSS UL class', 
        'display_social_class_ul', 
        'knotty-settings-social', 
        'social-css'
    );

    add_settings_field(
        'social_class_li', 
        'CSS LI class', 
        'display_social_class_li', 
        'knotty-settings-social', 
        'social-css'
    );

    add_settings_field(
        'social_class_a', 
        'CSS A class', 
        'display_social_class_a', 
        'knotty-settings-social', 
        'social-css'
    );

    // URLs
    add_settings_field(
        'social_amazon', 
        'Amaxon', 
        'display_social_amazon', 
        'knotty-settings-social', 
        'social-urls'
    );

    add_settings_field(
        'social_etsy', 
        'Etsy', 
        'display_social_etsy', 
        'knotty-settings-social', 
        'social-urls'
    );

    add_settings_field(
        'social_github', 
        'GitHub', 
        'display_social_github', 
        'knotty-settings-social', 
        'social-urls'
    );

    add_settings_field(
        'social_codepen', 
        'CodePen', 
        'display_social_codepen', 
        'knotty-settings-social', 
        'social-urls'
    );

    add_settings_field(
        'social_jsfiddle', 
        'JSFiddle', 
        'display_social_jsfiddle', 
        'knotty-settings-social', 
        'social-urls'
    );

    add_settings_field(
        'social_linkedin', 
        'LinkedIn', 
        'display_social_linkedin', 
        'knotty-settings-social', 
        'social-urls'
    );

    add_settings_field(
        'social_fb', 
        'Facebook', 
        'display_social_fb', 
        'knotty-settings-social', 
        'social-urls'
    );

    add_settings_field(
        'social_twitter', 
        'Twitter', 
        'display_social_twitter', 
        'knotty-settings-social', 
        'social-urls'
    );

    add_settings_field(
        'social_yt', 
        'YouTube', 
        'display_social_yt', 
        'knotty-settings-social', 
        'social-urls'
    );

    add_settings_field(
        'social_pinterest', 
        'Pinterest', 
        'display_social_pinterest', 
        'knotty-settings-social', 
        'social-urls'
    );

    add_settings_field(
        'social_instagram', 
        'Instagram', 
        'display_social_instagram', 
        'knotty-settings-social', 
        'social-urls'
    );

    // Icons
    add_settings_field(
        'social_amazon_icon', 
        'Amaxon Icon', 
        'display_social_amazon_icon', 
        'knotty-settings-social', 
        'social-icons'
    );

    add_settings_field(
        'social_etsy_icon', 
        'Etsy Icon', 
        'display_social_etsy_icon', 
        'knotty-settings-social',
        'social-icons'
    );

    add_settings_field(
        'social_github_icon', 
        'GitHub Icon', 
        'display_social_github_icon', 
        'knotty-settings-social', 
        'social-icons'
    );

    add_settings_field(
        'social_codepen_icon', 
        'CodePen Icon', 
        'display_social_codepen_icon', 
        'knotty-settings-social', 
        'social-icons'
    ); 

    add_settings_field(
        'social_jsfiddle_icon', 
        'JSFiddle Icon', 
        'display_social_jsfiddle_icon', 
        'knotty-settings-social', 
        'social-icons'
    ); 

    add_settings_field(
        'social_linkedin_icon', 
        'LinkedIn Icon', 
        'display_social_linkedin_icon', 
        'knotty-settings-social', 
        'social-icons'
    );

    add_settings_field(
        'social_fb_icon', 
        'Facebook Icon', 
        'display_social_fb_icon', 
        'knotty-settings-social', 
        'social-icons'
    );

    add_settings_field(
        'social_twitter_icon', 
        'Twitter Icon', 
        'display_social_twitter_icon', 
        'knotty-settings-social', 
        'social-icons'
    );

    add_settings_field(
        'social_yt_icon', 
        'YouTube Icon', 
        'display_social_yt_icon', 
        'knotty-settings-social', 
        'social-icons'
    );

    add_settings_field(
        'social_pinterest_icon', 
        'Pinterest Icon', 
        'display_social_pinterest_icon', 
        'knotty-settings-social', 
        'social-icons'
    );

    add_settings_field(
        'social_instagram_icon', 
        'Instagram Icon', 
        'display_social_instagram_icon', 
        'knotty-settings-social', 
        'social-icons'
    );

} //


// ------------------------------------------------------
// $callbacks to echo inputs
// ------------------------------------------------------

// CSS
function display_social_class_nav() { 
    ?>
        <input type='text' id='social_class_nav' name='social_class_nav' placeholder='' value='<?php echo get_option('social_class_nav'); ?>' size='80'> 
    <?php 
}

function display_social_class_ul() { 
    ?>
        <input type='text' id='social_class_ul' name='social_class_ul' placeholder='' value='<?php echo get_option('social_class_ul'); ?>' size='80'> 
    <?php 
}

function display_social_class_li() { 
    ?>
        <input type='text' id='social_class_li' name='social_class_li' placeholder='' value='<?php echo get_option('social_class_li'); ?>' size='80'> 
    <?php 
}

function display_social_class_a() { 
    ?>
        <input type='text' id='social_class_a' name='social_class_a' placeholder='' value='<?php echo get_option('social_class_a'); ?>' size='80'> 
    <?php 
}

// URLs
function display_social_amazon() { 
    ?>
        <input type="url" id="social_amazon" name="social_amazon" placeholder="" value="<?php echo get_option('social_amazon'); ?>" size="80"> 
    <?php 
}

function display_social_etsy() { 
    ?>
        <input type="url" id="social_etsy" name="social_etsy" placeholder="" value="<?php echo get_option('social_etsy'); ?>" size="80"> 
    <?php 
}

function display_social_github() { 
    ?>
        <input type="url" id="social_github" name="social_github" placeholder="" value="<?php echo get_option('social_github'); ?>" size="80"> 
    <?php 
}

function display_social_codepen() { 
    ?>
        <input type="url" id="social_codepen" name="social_codepen" placeholder="" value="<?php echo get_option('social_codepen'); ?>" size="80"> 
    <?php 
}

function display_social_jsfiddle() { 
    ?>
        <input type="url" id="social_jsfiddle" name="social_jsfiddle" placeholder="" value="<?php echo get_option('social_jsfiddle'); ?>" size="80"> 
    <?php 
}

function display_social_linkedin() { 
    ?>
        <input type="url" id="social_linkedin" name="social_linkedin" placeholder="" value="<?php echo get_option('social_linkedin'); ?>" size="80"> 
    <?php 
}

function display_social_fb() { 
    ?>
        <input type="url" id="social_fb" name="social_fb" placeholder="" value="<?php echo get_option('social_fb'); ?>" size="80"> 
    <?php 
}

function display_social_twitter() { 
    ?>
        <input type="url" id="social_twitter" name="social_twitter" placeholder="" value="<?php echo get_option('social_twitter'); ?>" size="80"> 
    <?php 
}

function display_social_yt() { 
    ?>
        <input type="url" id="social_yt" name="social_yt" placeholder="" value="<?php echo get_option('social_yt'); ?>" size="80"> 
    <?php 
}

function display_social_pinterest() { 
    ?>
        <input type="url" id="social_pinterest" name="social_pinterest" placeholder="" value="<?php echo get_option('social_pinterest'); ?>" size="80"> 
    <?php 
}

function display_social_instagram() { 
    ?>
        <input type="url" id="social_instagram" name="social_instagram" placeholder="" value="<?php echo get_option('social_instagram'); ?>" size="80"> 
    <?php 
}

// Icons
function display_social_amazon_icon() { 
    ?>
        <textarea id="social_amazon_icon" name="social_amazon_icon" cols="60" rows="1" placeholder=""><?php echo get_option('social_amazon_icon'); ?></textarea>
    <?php 
}

function display_social_etsy_icon() { 
    ?>
        <textarea id="social_etsy_icon" name="social_etsy_icon" cols="60" rows="1" placeholder=""><?php echo get_option('social_etsy_icon'); ?></textarea>
    <?php 
}

function display_social_github_icon() { 
    ?>
        <textarea id="social_github_icon" name="social_github_icon" cols="60" rows="1" placeholder=""><?php echo get_option('social_github_icon'); ?></textarea>
    <?php 
}

function display_social_codepen_icon() { 
    ?>
        <textarea id="social_codepen_icon" name="social_codepen_icon" cols="60" rows="1" placeholder=""><?php echo get_option('social_codepen_icon'); ?></textarea>
    <?php 
}

function display_social_jsfiddle_icon() { 
    ?>
        <textarea id="social_jsfiddle_icon" name="social_jsfiddle_icon" cols="60" rows="1" placeholder=""><?php echo get_option('social_jsfiddle_icon'); ?></textarea>
    <?php 
}

function display_social_linkedin_icon() { 
    ?>
        <textarea id="social_linkedin_icon" name="social_linkedin_icon" cols="60" rows="1" placeholder=""><?php echo get_option('social_linkedin_icon'); ?></textarea>
    <?php 
}

function display_social_fb_icon() { 
    ?>
        <textarea id="social_fb_icon" name="social_fb_icon" cols="60" rows="1" placeholder=""><?php echo get_option('social_fb_icon'); ?></textarea>
    <?php 
}

function display_social_twitter_icon() { 
    ?>
        <textarea id="social_twitter_icon" name="social_twitter_icon" cols="60" rows="1" placeholder=""><?php echo get_option('social_twitter_icon'); ?></textarea>
    <?php 
}

function display_social_yt_icon() { 
    ?>
        <textarea id="social_yt_icon" name="social_yt_icon" cols="60" rows="1" placeholder=""><?php echo get_option('social_yt_icon'); ?></textarea>
    <?php 
}

function display_social_pinterest_icon() { 
    ?>
        <textarea id="social_pinterest_icon" name="social_pinterest_icon" cols="60" rows="1" placeholder=""><?php echo get_option('social_pinterest_icon'); ?></textarea>
    <?php 
}

function display_social_instagram_icon() { 
    ?>
        <textarea id="social_instagram_icon" name="social_instagram_icon" cols="60" rows="1" placeholder=""><?php echo get_option('social_instagram_icon'); ?></textarea>
    <?php 
}


// ------------------------------------------------------
// Save default values to the options table
// ------------------------------------------------------





// ------------------------------------------------------
// Save default values to the options table
// ------------------------------------------------------
// function knotty_social_defaults() {

//     $defaults = array (
//         'social_css_nav'        => 'follow nav--horizontal nav--icons',
//         'social_css_ul'         => 'follow__ul',
//         'social_css_li'         => 'follow__li',
//         'social_css_a'          => 'follow__a',
//         'social_amazon_icon'    => '<i class="fab fa-amazon"></i>',
//         'social_etsy_icon'      => '<i class="fab fa-etsy"></i>',
//         'social_github_icon'    => '<i class="fab fa-github"></i>',
//         'social_codepen_icon'   => '<i class="fab fa-codepen"></i>',
//         'social_jsfiddle_icon'  => '<i class="fab fa-jsfiddle"></i>',
//         'social_linkedin_icon'  => '<i class="fab fa-linkedin-in"></i>',
//         'social_fb_icon'        => '<i class="fab fa-facebook-f"></i>',
//         'social_twitter_icon'   => '<i class="fab fa-twitter"></i>',
//         'social_yt_icon'        => '<i class="fab fa-youtube"></i>',
//         'social_pinterest_icon' => '<i class="fab fa-pinterest-p"></i>',
//         'social_instagram_icon' => '<i class="fab fa-instagram"></i>',
//     );

//     return $defaults;                    

// } //

