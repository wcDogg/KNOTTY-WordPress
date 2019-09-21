<?php
/**
 * 404.php
 * Displays 'page not found'
 * 
 * @package knotty
 * @since Knotty 1.0
 */
?>


<?php get_header(); ?>

<article class="error-404">

    <section class="section header header--archive">
        <div class="overlay__wrap">
            <div class="header__title-wrap overlay__content">
                <h1 class="header__title">404</h1>
                <h2 class="header__subtitle">Oops! Page Not Found</h2>
            </div>
            <div class="overlay"></div>
        </div>
    </section><!-- .header -->

    <?php get_template_part('parts/section/section', 'none'); ?>

</article><!-- .error-404 -->

<?php get_footer(); ?>