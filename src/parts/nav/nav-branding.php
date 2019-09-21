<?php
/**
 * nav-branding.php
 * 
 * @package knotty
 * @since Knotty 1.0
 */
?>


<a class="branding" rel="bome" title="<?php bloginfo( 'name' ); ?> Home" href="<?php echo esc_url( home_url( '/' ) ); ?>" >

    <div class="branding__img">
        <?php the_custom_logo(); ?>
    </div>

    <h1 class="branding__title">
        <?php bloginfo( 'name' ); ?>
    </h1>

</a>


