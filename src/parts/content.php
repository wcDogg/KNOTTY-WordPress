<?php
/**
 * content.php
 * Fallback if no other content template exists
 * 
 * @package knotty
 * @since Knotty 1.0
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 

    get_template_part('parts/header/header'); 
    
    if ( have_rows('flex_content') ):
        get_template_part('parts/section/section', 'flex' ); 
    elseif ( $post->post_content=="" ) :
        get_template_part('parts/section/section', 'content' ); 
    else :
        get_template_part('parts/section/section', 'none' ); 
    endif;

	get_template_part('parts/section/section', 'comments' );

?>
</article><!-- #post-<?php the_ID(); ?> --> 