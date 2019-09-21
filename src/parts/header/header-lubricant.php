<?php
/**
 * header-lubricant.php
 * 
 * @package knotty
 * @since Knotty 1.0
 */

$page_title = get_the_title();
$page_subtitle = get_field('page_subtitle'); // slick

?>

<section class="section header header--lubricant">
    <div class="header__inner">

        <div class="header__meta-wrap">

            <?php if ( has_term( '', 'brands' ) ) :
                echo '<div class="meta meta--brands">';
                    echo '<span class="meta__value">'; 
                        the_terms( get_the_ID(), 'brands', '', ', ' );
                    echo '</span>';
                echo '</div>';	    
            endif; ?>       

            <?php if ( has_term( '', 'formulas' ) ) :
                echo '<div class="meta meta--formulas">';
                    echo '<span class="meta__value">'; 
                        the_terms( get_the_ID(), 'formulas', '', ', ' );
                    echo '</span>';
                echo '</div>';	    
            endif; ?>    

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
            <h2 class="header__subtitle"><?php echo $page_subtitle ?></h2>
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

    </div><!-- .section__inner -->
</section><!-- .section.header-->