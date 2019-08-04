<?php

// @see Admin > Settings > Social URLs
// @see /parts/nav/share.php


// The options page
function theme_settings_social(){ 

    echo '<div class="wrap">';
            
		echo '<form method="post" action="options.php">';

			settings_fields("section");
			do_settings_sections("theme-options-social");
			submit_button();

        echo '</form>';
        
    echo '</div><!-- .wrap -->';
    
} //


// The Options
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


// Assemble page + options
function display_custom_info_fields(){
    
    // Add the section
	add_settings_section("section", "Social URLs", null, "theme-options-social");
    
    // Register + display fields
    add_settings_field("social_amazon", "Amaxon", "display_social_amazon", "theme-options-social", "section");
    register_setting("section", "social_amazon");

    add_settings_field("social_etsy", "Etsy", "display_social_etsy", "theme-options-social", "section");
    register_setting("section", "social_etsy");

    add_settings_field("social_github", "GitHub", "display_social_github", "theme-options-social", "section");
    register_setting("section", "social_github"); 

    add_settings_field("social_codepen", "CodePen", "display_social_codepen", "theme-options-social", "section");
    register_setting("section", "social_codepen"); 
    
    add_settings_field("social_jsfiddle", "JSFiddle", "display_social_jsfiddle", "theme-options-social", "section");
    register_setting("section", "social_jsfiddle");     

    add_settings_field("social_linkedin", "LinkedIn", "display_social_linkedin", "theme-options-social", "section");
    register_setting("section", "social_linkedin");

    add_settings_field("social_fb", "Facebook", "display_social_fb", "theme-options-social", "section");
    register_setting("section", "social_fb");

    add_settings_field("social_twitter", "Twitter", "display_social_twitter", "theme-options-social", "section");
    register_setting("section", "social_twitter");

    add_settings_field("social_yt", "YouTube", "display_social_yt", "theme-options-social", "section");
    register_setting("section", "social_yt");

    add_settings_field("social_pinterest", "Pinterest", "display_social_fb", "theme-options-social", "section");
    register_setting("section", "social_pinterest");

    add_settings_field("social_instagram", "Instagram", "display_social_instagram", "theme-options-social", "section");
    register_setting("section", "social_instagram");	

}
add_action("admin_init", "display_custom_info_fields");


// Add menu item
function knotty_admin_social_urls(){
	
	add_options_page("Social URLs", "Social URLs", "manage_options", "social-urls", "theme_settings_social");
	
}
add_action("admin_menu", "knotty_admin_social_urls");
