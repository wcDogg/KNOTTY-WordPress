<?php
/**
 * section-comments
 * Calls all the comment template parts
 * 
 * @requires comments.php
 * @requires section-comments.php - this file
 * @requires /inc/comments-list.php
 * @requires /inc/comments-form.php
 * @requires /sass/sections/_section-comments.scss
 * 
 * @package knotty
 * @since Knotty 1.0
 */


// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;