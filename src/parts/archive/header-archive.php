<?php
/**
 * header-archive.php
 * Displays single posts and custom post types
 * 
 * @package knotty
 * @since Knotty 1.0
 */


$tax = get_queried_object(); 
$tax_title = get_the_archive_title();
$tax_subtitle = get_field('subtitle', $tax);
$tax_description = get_the_archive_description($tax);
$tax_image = get_field('tax_image', $tax);
$tax_image_url = $tax_image['url'];

?>

<section class="section header header--archive">

    <div class="overlay__wrap">

        <div class="overlay"></div>

        <div class="header__title-wrap overlay__content">
            <h1 class="header__title"><?php echo $tax_title ?></h1>
            <?php if ($tax_subtitle) : ?>
                <h2 class="header__subtitle"><?php echo $tax_subtitle ?></h2>
            <?php endif; ?>
        </div>     
        
        <?php if ($tax_image) :       
            echo '<div class="overlay__img" style="background-image: url('.esc_url($tax_image_url).');" >';
        endif ?>     

    </div><!-- .overlay__wrap -->
   
    <div class="header__inner">
        <?php if ( $tax_description ) :
            echo '<div class="header__summary">';
                echo $tax_description;
            echo '</div><!-- .header__summary -->';
        endif; ?>	

        <?php get_template_part('parts/archive/part', 'filters'); ?>

    </div><!-- .header__inner -->

</section><!-- .header -->