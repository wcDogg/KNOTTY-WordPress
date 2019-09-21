<?php
/**
 * theme_comment-list.php
 * Custom callback for displaying comments
 *  
 * @requires comments.php
 * @requires section-comments.php
 * @requires /inc/comments-list.php - this file
 * @requires /inc/comments-form.php
 * @requires /sass/sections/_section-comments.scss
 * 
 * @package knotty
 * @since Knotty 1.0
 */

 
function knotty_comments_list($comment, $args, $depth) {
    $tag       = 'div';
    $add_below = 'comment'; ?>  

     <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php    

        echo '<div class="comment__header">';
            echo '<span class="comment__vcard">';
                if ( $args['avatar_size'] != 0 ) :
                    echo '<span class="comment__avatar">';
                        echo get_avatar( $comment, $args['avatar_size'] ); // img.avatar
                    echo '</span>';
                endif;
                printf( __( '<span class="comment__author">%s</span>' ), get_comment_author_link() ); 
            echo '</span>'; ?>

            <a class="comment__link" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
                /* translators: 1: date, 2: time */
                printf( 
                    __('%1$s'), 
                    get_comment_date()
                ); ?>
            </a> <?php 
        echo '</div><!-- .comment__header -->';

        echo '<div class="comment__main">';
            comment_text(); 
            echo '<div class="comment__links">';
                comment_reply_link( // a.comment-reply-link
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                );

                edit_comment_link( __( ' Edit' ), '  ', '' ); // a.comment-edit-link

            echo '</div><!-- .comment__links -->';             
        echo '</div><!-- .comment__main -->';  

        if ( $comment->comment_approved == '0' ) :
            echo '<div class="comment__moderation">Thanks for your feedback! As a safe harbor, we moderate all comments - usually within 24 hours.</div>';
        endif;        
        
} //

