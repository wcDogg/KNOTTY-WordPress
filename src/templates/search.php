<?php
/**
 * search.php
 * Displays search results
 * 
 * @package knotty
 * @since Knotty 1.0
 */
?>


<?php get_header(); ?>

<article class="search">

    <section class="section header header--archive">
        <div class="overlay__wrap">
            <div class="header__title-wrap overlay__content">
                <h1 class="header__title">Search</h1>
                <h2 class="header__subtitle"><?php printf( __( '%s', 'knotty' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
            </div>
            <div class="overlay"></div>
        </div>
    </section><!-- .header -->

    <?php if ( have_posts() ) : ?>

        <section class="section cards cards--multi">
            <div class="section__inner">

                <div class="section__search">
                    <?php get_search_form(); ?>
                </div><!-- .section__search -->

                <div class="section__cards">

					<?php while ( have_posts() ) :					
						the_post();	
						get_template_part( 'parts/card', get_post_type() );	
					endwhile; ?>

                </div><!-- .section__cards-->

                <?php get_template_part('parts/archive/nav', 'archive'); ?>

            </div><!-- .section__inner -->
        </section><!-- .section -->

    <?php else :

        get_template_part('parts/section/section', 'none');

    endif; ?>
 
</article><!-- .search -->

<?php get_footer(); ?>