<?php
/**
 * nav-mobile.php
 * 
 * @package knotty
 * @since Knotty 1.0
 */
?>

<nav id="mobile-nav" aria-label="Main Navigation">

    <button id="mobile-open" type="button" aria-label="Open Navigation" aria-haspopup="true">
		<i class="fas fa-bars"></i>
	</button>
	
	<div id="mobile-overlay">

		<button id="mobile-close" type="button" aria-label="Close Navigation">
			<i class="fas fa-times"></i>
		</button>

		<div id="mobile-content">

			<div id="mobile-top">
				<?php get_template_part('parts/nav/nav', 'branding'); ?>		
			</div>

			<?php if( wp_get_nav_menu_name('menu-mobile')  ) :   
					
                $args = array(
                    'theme_location'  => 'menu-mobile',
                    'menu_id'         => 'mobile-menu',

                    'container'       => false,
                    'depth'           => 2,
                    'fallback_cb'     => false,
                );

                wp_nav_menu( $args ); 
					
            endif; ?>

			<div id="mobile-bottom">
				<?php get_template_part('parts/nav/nav', 'follow'); ?>
				<?php get_search_form(); ?>		
			</div>

			<a id="mobile-close-sr" href="javascript:void(0);" title="Close Menu">Close Menu</a>

		</div><!-- #mobile-content -->

	</div><!-- #mobile-overlay -->
</nav><!-- #mobile-nav -->