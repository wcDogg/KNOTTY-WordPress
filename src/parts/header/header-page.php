<?php
/**
 * header-page.php
 * 
 * @package knotty
 * @since Knotty 1.0
 */

$page_title = get_the_title();
$page_subtitle = get_field('subtitle'); // knotty
$page_summary = get_field('summary'); // knotty

// $page_subtitle = get_field('page_subtitle'); // knotty
// $page_summary = get_field('page_summary');  //knotty

$page_image_url = get_the_post_thumbnail_url('full'); 

?>

<section class="section header header--page">

    <div class="overlay__wrap">

        <div class="overlay"></div>

        <div class="header__title-wrap overlay__content">
            <h1 class="header__title"><?php echo $page_title ?></h1>
            <?php if ($page_subtitle) : ?>
                <h2 class="header__subtitle"><?php echo $page_subtitle ?></h2>
            <?php endif; ?>
        </div>  

        <?php if ( has_post_thumbnail() ) :
            echo '<div class="overlay__img" style="background-image: url('.esc_url($page_image_url).');" ></div>';
        endif; ?> 

    </div><!-- .overlay__wrap -->

    <div class="header__inner">

        <?php get_template_part('parts/header/part', 'share'); ?>       

        <?php if ($page_summary) : ?>
            <div class="header__summary">
                <?php echo $page_summary; ?>
            </div><!-- .header__summary -->  
        <?php endif; ?>

    </div><!-- .section__inner -->

</section><!-- .header -->