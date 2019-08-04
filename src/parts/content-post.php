<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part('parts/headers/header', get_post_type() ); ?>
	<?php get_template_part('parts/page/page', 'flex' ); ?>
	<?php get_template_part('parts/page/page', 'comments' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
