<?php
    namespace Comments;
    use Membership\GetUserMeta;
    use Membership\GetUserRatingMeta;
    class GetComments {
        public static function get($post_id) {
            $data = [];
            $args = array(
                'post_id' => $post_id,
                'hierarchical' => true,
                'status'       => 'approve',
            );
            $comments = get_comments( $args );
            foreach ($comments as $key => $comment) :
                $comment = (array) $comment;
                $author_id = get_user_by('login', $comment['comment_author'])->ID;
                $author_name = $comment['comment_author'];
                list($author_fullname, $author_email) = GetUserMeta::get($author_id);
                $author_fullname = !empty($author_fullname) ? $author_fullname : $author_name;
                $ratings = GetUserRatingMeta::get_by_product($author_id, $post_id);
                $date = human_time_diff(strtotime($comment['comment_date']), current_time( 'timestamp' )) . ' trước';
                $contents = $comment['comment_content'];
                $parent = $comment['comment_parent'];
                $user_meta_id = get_comment_meta($comment['comment_ID'], COMMENT_META_KEYS::USER_COMMENT_ID, true);
                $user_meta_rating = get_comment_meta($comment['comment_ID'], COMMENT_META_KEYS::USER_RATING_POINT, true);
                $data[] = [
                    'author_id' => $author_id,
                    'author_name' => $author_name,
                    'author_fullname' => $author_fullname,
                    'author_email' => $author_email,
                    'author_ratings' => $ratings,
                    'comments' => $contents,
                    'date_created' => $date,
                    'parent' => $parent,
                    'meta' => [
                        'user_id' => $user_meta_id,
                        'user_rating' => $user_meta_rating
                    ]
                ];
            endforeach;
            return $data;
        }
    }