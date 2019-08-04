<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part('parts/headers/header'); ?>
	<?php get_template_part('parts/content'); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php get_footer(); ?>
