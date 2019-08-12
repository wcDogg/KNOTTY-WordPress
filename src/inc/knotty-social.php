<?php

// ------------------------------------------------------
// Add Admin > Settings > Theme Social Menu nav item
// ------------------------------------------------------

function knotty_social_admin_menu() {
	add_options_page(
		'Theme Social Menu',  // $page_title
		'Theme Social Menu',  // $menu_title
		'manage_options',     // $capability required to display this menu
		'theme-social',       // $menu_slug of this menu
		'knotty_social'       // $function to render Theme Social Menu page
	);
}
add_action( 'admin_menu', 'knotty_social_admin_menu' );


// ------------------------------------------------------  
// $function to render the Theme Social Menu page
// Admin > Settings > Theme Social Menu
// ------------------------------------------------------  

function knotty_social() { 

    echo '<div class="wrap">';   

        echo '<h2>Theme Social Menu</h2>';

		echo '<form method="post" action="options.php">';

            do_settings_sections('theme-social'); // $menu_slug where settings will render
            settings_fields( 'theme-social-settings');
            submit_button();
                    
        echo '</form>';      
    echo '</div><!-- .wrap -->';
    
} //


// ------------------------------------------------------
// Add Theme Social Menu: Social CSS section
// ------------------------------------------------------

function knotty_social_init_section_css() {

    // Add section
    add_settings_section(
        'social-css',              // $id of this section
        'SOCIAL CSS',              // $title of this section
        'knotty_social_css_intro', // $callback function for intro content at start of section
        'theme-social'             // $page = 'theme-social' = add_options_page > $menu_slug
    );

    // Register field $args
     $args = array(
        'type' => 'string', 
        'sanitize_callback' => 'sanitize_text_field',
        'default' => NULL,
    );   

    // Add field to section
    add_settings_field(
        'social_class_nav',   // $id for this field
        'CSS NAV class',      // $title for this field
        'display_social_class_nav',  // $callback to echo this field
        'theme-social',       // $page = 'theme-social' = add_options_page > $menu_slug
        'social-css'          // $section = add_settings_section() > $id
    );
    // Register field
    register_setting(
        'theme-social-settings', // $option_group = knotty_social() > settings_fields
        'social_class_nav',         // $option_name = add_setting_field() > $id
        $args
    );

    add_settings_field(
        'social_class_ul', 
        'CSS UL class', 
        'display_social_class_ul', 
        'theme-social', 
        'social-css'
    );
    register_setting(
        'theme-social-settings', 
        'social_class_ul',
        $args
    );

    add_settings_field(
        'social_class_li', 
        'CSS LI class', 
        'display_social_class_li', 
        'theme-social', 
        'social-css'
    );
    register_setting(
        'theme-social-settings', 
        'social_class_li',
        $args
    );  

    add_settings_field(
        'social_class_a', 
        'CSS A class', 
        'display_social_class_a', 
        'theme-social', 
        'social-css'
    );
    register_setting(
        'theme-social-settings', 
        'social_class_a',
        $args
    ); 

} //
add_action( 'admin_init', 'knotty_social_init_section_css' );


// $callback function for intro content
function knotty_social_css_intro() {
    echo '<p>The Social Menu structure is nav : ul : li : a. Here you can add theme-specific CSS classes for these tags.</p>';
}


// $callbacks to echo feilds
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



// ------------------------------------------------------
// Add Theme Social Menu: Social URLs section
// ------------------------------------------------------

function knotty_social_init_section_urls() {

    // Add section
    add_settings_section(
        'social-urls',              // $id of this section
        'SOCIAL URLs',              // $title of this section
        'knotty_social_urls_intro', // $callback function for intro content at start of section
        'theme-social'              // $page = 'theme-social' = add_options_page > $menu_slug
    );

    // Register field $args
     $args = array(
        'type' => 'string', 
        'sanitize_callback' => 'esc_url_raw',
        'default' => NULL,
    );   

    add_settings_field(
        'social_amazon', 
        'Amaxon', 
        'display_social_amazon', 
        'theme-social', 
        'social-urls'
    );
    register_setting(
        'theme-social-settings', 
        'social_amazon',
        $argc
    );

    add_settings_field(
        'social_etsy', 
        'Etsy', 
        'display_social_etsy', 
        'theme-social', 
        'social-urls'
    );
    register_setting(
        'theme-social-settings', 
        'social_etsy',
        $args
    );

    add_settings_field(
        'social_github', 
        'GitHub', 
        'display_social_github', 
        'theme-social', 
        'social-urls'
    );
    register_setting(
        'theme-social-settings', 
        'social_github',
        $args
    ); 

    add_settings_field(
        'social_codepen', 
        'CodePen', 
        'display_social_codepen', 
        'theme-social', 
        'social-urls'
    );
    register_setting(
        'theme-social-settings', 
        'social_codepen',
        $args
    ); 
    
    add_settings_field(
        'social_jsfiddle', 
        'JSFiddle', 
        'display_social_jsfiddle', 
        'theme-social', 
        'social-urls'
    );
    register_setting(
        'theme-social-settings', 
        'social_jsfiddle',
        $args
    );     

    add_settings_field(
        'social_linkedin', 
        'LinkedIn', 
        'display_social_linkedin', 
        'theme-social', 
        'social-urls'
    );
    register_setting(
        'theme-social-settings', 
        'social_linkedin',
        $args
    );

    add_settings_field(
        'social_fb', 
        'Facebook', 
        'display_social_fb', 
        'theme-social', 
        'social-urls'
    );
    register_setting(
        'theme-social-settings', 
        'social_fb',
        $args
    );

    add_settings_field(
        'social_twitter', 
        'Twitter', 
        'display_social_twitter', 
        'theme-social', 
        'social-urls'
    );
    register_setting(
        'theme-social-settings', 
        'social_twitter',
        $args
    );

    add_settings_field(
        'social_yt', 
        'YouTube', 
        'display_social_yt', 
        'theme-social', 
        'social-urls'
    );
    register_setting(
        'theme-social-settings', 
        'social_yt',
        $args
    );

    add_settings_field(
        'social_pinterest', 
        'Pinterest', 
        'display_social_pinterest', 
        'theme-social', 
        'social-urls'
    );
    register_setting(
        'theme-social-settings', 
        'social_pinterest',
        $args
    );

    add_settings_field(
        'social_instagram', 
        'Instagram', 
        'display_social_instagram', 
        'theme-social', 
        'social-urls'
    );
    register_setting(
        'theme-social-settings', 
        'social_instagram',
        $args
    );	
 
} //
add_action( 'admin_init', 'knotty_social_init_section_urls' );


// $callback function for intro content
function knotty_social_urls_intro() {
    echo '<p>Enter the URLs for the platforms you want to display in the Social Menu.</p>';
}


// $callbacks to echo feilds
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


// ------------------------------------------------------
// Add Theme Social Menu: Social Icons section
// ------------------------------------------------------

function knotty_social_init_section_icons() {

    // Add section
    add_settings_section(
        'social-icons',             // $id of this section
        'SOCIAL ICONS',             // $title of this section
        'knotty_social_icons_intro', // $callback function for intro content at start of section
        'theme-social'              // $page = 'theme-social' = add_options_page > $menu_slug
    );   

    $args = array(
        'type' => 'string', 
        'sanitize_callback' => 'wp_kses_post',
    );

    add_settings_field(
        'social_amazon_icon', 
        'Amaxon Icon', 
        'display_social_amazon_icon', 
        'theme-social', 
        'social-icons'
    );
    register_setting(
        'theme-social-settings', 
        'social_amazon_icon',
        $args
    );

    add_settings_field(
        'social_etsy_icon', 
        'Etsy Icon', 
        'display_social_etsy_icon', 
        'theme-social',
        'social-icons'
    );
    register_setting(
        'theme-social-settings', 
        'social_etsy_icon',
        $args
    );

    add_settings_field(
        'social_github_icon', 
        'GitHub Icon', 
        'display_social_github_icon', 
        'theme-social', 
        'social-icons'
    );
    register_setting(
        'theme-social-settings', 
        'social_github_icon',
        $args
    ); 

    add_settings_field(
        'social_codepen_icon', 
        'CodePen Icon', 
        'display_social_codepen_icon', 
        'theme-social', 
        'social-icons'
    );
    register_setting(
        'theme-social-settings', 
        'social_codepen_icon',
        $args
    ); 
    
    add_settings_field(
        'social_jsfiddle_icon', 
        'JSFiddle Icon', 
        'display_social_jsfiddle_icon', 
        'theme-social', 
        'social-icons'
    );
    register_setting(
        'theme-social-settings', 
        'social_jsfiddle_icon',
        $args
    );     

    add_settings_field(
        'social_linkedin_icon', 
        'LinkedIn Icon', 
        'display_social_linkedin_icon', 
        'theme-social', 
        'social-icons'
    );
    register_setting(
        'theme-social-settings', 
        'social_linkedin_icon',
        $args
    );

    add_settings_field(
        'social_fb_icon', 
        'Facebook Icon', 
        'display_social_fb_icon', 
        'theme-social', 
        'social-icons'
    );
    register_setting(
        'theme-social-settings', 
        'social_fb_icon',
        $args
    );

    add_settings_field(
        'social_twitter_icon', 
        'Twitter Icon', 
        'display_social_twitter_icon', 
        'theme-social', 
        'social-icons'
    );
    register_setting(
        'theme-social-settings', 
        'social_twitter_icon',
        $args
    );

    add_settings_field(
        'social_yt_icon', 
        'YouTube Icon', 
        'display_social_yt_icon', 
        'theme-social', 
        'social-icons'
    );
    register_setting(
        'theme-social-settings', 
        'social_yt_icon',
        $args
    );

    add_settings_field(
        'social_pinterest_icon', 
        'Pinterest Icon', 
        'display_social_pinterest_icon', 
        'theme-social', 
        'social-icons'
    );
    register_setting(
        'theme-social-settings', 
        'social_pinterest_icon',
        $args
    );

    add_settings_field(
        'social_instagram_icon', 
        'Instagram Icon', 
        'display_social_instagram_icon', 
        'theme-social', 
        'social-icons'
    );
    register_setting(
        'theme-social-settings', 
        'social_instagram_icon',
        $args
    );	

} //
add_action( 'admin_init', 'knotty_social_init_section_icons' );


// $callback function for intro content
function knotty_social_icons_intro() {
    echo '<p>The Soical Menu uses Font Awesome 5 Free icons by default. Here you can override indvidual icons.</p>';
}   


// $callbacks to echo feilds
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

// function knotty_social_defaults() {

//     $defaults = array (
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

// }

