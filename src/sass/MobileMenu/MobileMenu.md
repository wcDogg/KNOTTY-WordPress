# MobileMenu.js

A keyboard-accessible mobile menu written in vanilla JS using WordPress default menu classes.

# functions.php: Register menu area

    if ( ! function_exists( 'my_theme_setup' ) ) :

        function my_theme_setup() {
            register_nav_menus( array(
                'menu-mobile' => esc_html__( 'Mobile Menu', 'my-theme' ),		
            ) );
        }

    endif;

    add_action( 'after_setup_theme', 'my_theme_setup' );


# functions.php: Register + Enqueue Scripts

    function my_theme_register_scripts() {
        wp_register_script( 'polyfill', get_template_directory_uri() . '/js/Polyfill.js', array(), '', true );
        wp_register_script( 'mobile-menu', get_template_directory_uri() . '/js/MobileMenu.js', array(), '', true );	
    }
    add_action( 'wp_enqueue_scripts', 'my_theme_register_scripts' );

    function my_theme_scripts_enqueue() {
        wp_enqueue_script( 'polyfill' );
        wp_enqueue_script( 'mobile-menu' );
    }
    add_action( 'wp_enqueue_scripts', 'my_theme_scripts_enqueue' );

# template-part.php: Nav structure

    <?php $location = wp_get_nav_menu_name('menu-mobile');  ?>

    <?php if($location) : ?>

        <nav id="mobile-nav">
            <button id="mobile-open"></button>
            <div id="mobile-overlay">
                <button id="mobile-close"></button>
                <div id="mobile-top">Content before menu.</div>
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-mobile',	
                        'menu_id'        => 'mobile-menu'
                    ) ); 
                ?>
                <div id="mobile-bottom">Content after menu.</div>
                <a id="mobile-close-sr">Close menu</a>
            </div>
        </nav>

    <?php endif; ?>

## Footer Script

    <script>MobileMenu.init();</script>



