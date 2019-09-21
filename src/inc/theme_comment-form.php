<?php
/**
 * theme_comment-form.php
 * Remove the 'Website' field from the Commcent form
 * 
 * @requires comments.php
 * @requires section-comments.php
 * @requires /inc/comments-list.php
 * @requires /inc/comments-form.php - this file
 * @requires /sass/sections/_section-comments.scss
 * 
 * @package knotty
 * @since Knotty 1.0
 */

function remove_cooment_form_fields($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'remove_cooment_form_fields');

