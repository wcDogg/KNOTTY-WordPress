<?php
/**
 * theme_ga.php
 * Add Google Analytics tracking Ccode
 * Add opt-out script
 * Create shortcode for opt-out link
 * 
 * knotty UA-144999388-1
 * slick  UA-140000021-1
 * 
 * @package knotty
 * @since Knotty 1.0
 */


// Add GA Global Tag to site `head`
// Replace 2 instances of `UA-XXXXXXXXX-X` with property (account) ID.
function knotty_ga_global_tag() { 
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144999388-1"></script>
    <script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-144999388-1');
	</script>	
    <?php 
}
add_action( 'wp_head', 'knotty_ga_global_tag', 1 );


// GA Opt-Out script for this site
// Since we are only presenting this option on the Privacy Page,
// we only need the GA opt-out script to this page's `head`
// https://wordpress.stackexchange.com/a/314372

$privacy_policy_page = get_option( 'wp_page_for_privacy_policy' );

if( $privacy_policy_page ) : 
    function knotty_ga_opt_out(){     
        ?>
        <!-- Disable Google Analytics for this site -->
        <script>
            // Replace `UA-XXXXXXXXX-X` with property ID
            var gaProperty = 'UA-144999388-1';
            var disableStr = 'ga-disable-' + gaProperty;
            if (document.cookie.indexOf(disableStr + '=true') > -1) {
                window[disableStr] = true;
            }
            function gaOptout() {
                document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
                window[disableStr] = true;
                alert('Google Analytics has been disabled for this site.');
            }
        </script>
        <?php
    }
    add_action( 'wp_head', 'knotty_ga_opt_out', 1 );
endif;	


// Create `[ga_opt_out]' shortcode to insert
// GA Opt-Out button or link in text editor.
// @see functions.php for registered shortcodes.
function knotty_ga_opt_out_button() {
    $return = '<a href="javascript:gaOptout()">Opt out of Google Analytics for this site</a>';

    return $return;
}


// 
// Register Shortcode
//
function knotty_register_shortcodes() {
   add_shortcode( 'ga_opt_out', 'knotty_ga_opt_out_button' ); 
}

add_action( 'init', 'knotty_register_shortcodes');

