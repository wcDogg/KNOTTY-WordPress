<?php
/**
 * content-page.php
 * Displays single page content
 * 
 * @package knotty
 * @since Knotty 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 

	get_template_part('parts/header/header', get_post_type() ); 
	get_template_part('parts/section/section', 'flex' ); 
	// get_template_part('parts/section/section', 'zotpress' );
	get_template_part('parts/section/section', 'comments' );

?>
</article><!-- #post-<?php the_ID(); ?> --> 