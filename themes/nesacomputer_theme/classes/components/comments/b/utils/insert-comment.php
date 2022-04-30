<?php
    namespace Comments;
    use Membership\UpdateUserRatingMeta;
    class InsertComment {
        public static function perform($field, $postId) {
            extract($field);
            $comment_parent = !empty($comment_parent) ? $comment_parent : 0;
            $current_user = wp_get_current_user();
            if ( comments_open( $postId ) ) :
                $data = array(
                    'comment_post_ID'      => $postId,
                    'comment_content'      => $comments,
                    'comment_parent'       => $comment_parent,
                    'user_id'              => $current_user->ID,
                    'comment_author'       => $current_user->user_login,
                    'comment_author_email' => $current_user->user_email,
                    'comment_author_url'   => $current_user->user_url,
                    'comment_meta' => [
                        COMMENT_META_KEYS::USER_COMMENT_ID => $current_user->ID,
                        COMMENT_META_KEYS::USER_RATING_POINT => $rating,
                    ]
                );     
                $comment_id = wp_insert_comment( $data );    
                UpdateUserRatingMeta::update($current_user->ID, $rating, $postId);            
            endif;
        }
    }