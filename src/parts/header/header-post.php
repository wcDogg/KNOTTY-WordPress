<?php
/**
 * header-post.php
 * 
 * @package knotty
 * @since Knotty 1.0
 */

$page_title = get_the_title();
$page_subtitle = get_field('subtitle'); // knotty
$page_summary = get_field('summary'); // knotty

// $page_subtitle = get_field('page_subtitle'); // knotty
// $page_summary = get_field('page_summary');  //knotty

$icon_categories = '<i class="fas fa-th-large"></i>';
$icon_tags = '<i class="fas fa-hashtag"></i>';  

?>

<section class="section header header--post">
    <div class="header__inner">

        <div class="header__meta-wrap">

            <div class="meta meta--categories">
                <?php 
                    echo '<span class="meta__value">';  
                        the_category( '&nbsp;&bull;&nbsp;' );
                    echo '</span>';
                ?>
            </div>

            <div class="meta meta--date">
                <?php 
                    echo '<span class="meta__value">';  
                       knotty_posted_on();
                    echo '</span>';
                ?>
            </div>

        </div><!-- .header__meta-wrap -->

        <div class="header__title-wrap">
            <h1 class="header__title"><?php echo $page_title ?></h1>
            <?php if ($page_subtitle) : ?>
                <h2 class="header__subtitle"><?php echo $page_subtitle ?></h2>
            <?php endif; ?>
        </div>

        <div class="overlay__wrap">

            <div class="overlay"></div>

            <?php if ( has_post_thumbnail() ) :
                the_post_thumbnail( 'medium_large', array(
                    'alt' => the_title_attribute( array(
                        'echo' => false,
                    ) ),
                    'class' => 'overlay__img',
                ) ); 
            endif; ?>

        </div><!-- .overlay__wrap -->

        <?php get_template_part('parts/header/part', 'share'); ?>

        <div class="header__summary">

            <?php if ($page_summary) :
                echo $page_summary;
            endif; ?>

            <div class="meta meta--categories">
                <?php 
                    echo $icon_categories;
                    echo '<span class="meta__value">';  
                        the_category( '&nbsp;&bull;&nbsp;' );
                    echo '</span>';
                ?>
            </div>

            <?php
                if(has_tag()) :
                    echo '<div class="meta meta--tags">';
                        echo $icon_tags;
                        echo '<span class="meta__value">';  
                            the_tags( '', '&nbsp;&bull;&nbsp;' );
                        echo '</span>';
                    echo '</div>';
                endif;
            ?>

        </div><!-- .header__summary -->

        <!-- <div class="header__toggle-wrap">
            <a class="button">TOC</a>
        </div> -->

    </div><!-- .section__inner -->
</section><!-- .section.header-->

