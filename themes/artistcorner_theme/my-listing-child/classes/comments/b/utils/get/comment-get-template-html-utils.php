<?php 

    namespace Comments;

    class CommentGetTemplateHtmlUtils {

        public static function get_in_ajax($comment) {

            /*
            * Set Cookies
            */
            $user = wp_get_current_user();
            do_action('set_comment_cookies', $comment, $user);
        
            /*
            * If you do not like this loop, pass the comment depth from JavaScript code
            */
            $comment_depth = 1;
            $comment_parent = $comment->comment_parent;
            while( $comment_parent ){
                $comment_depth++;
                $parent_comment = get_comment( $comment_parent );
                $comment_parent = $parent_comment->comment_parent;
            }
        
            /*
            * Set the globals, so our comment functions below will work correctly
            */
            $GLOBALS['comment'] = $comment;
            $GLOBALS['comment_depth'] = $comment_depth;

            $comment_text = apply_filters( 'comment_text', get_comment_text( $comment ), $comment );

            $comment_html = '<li ' . comment_class('single-comment', null, null, false ) . ' id="comment-' . get_comment_ID() . '">
                                <div class="comment-container">
                                    <div class="comment-head">
                                        <div class="c27-user-avatar">' .
                                            get_avatar( $comment, 32 ) . '
                                        </div>
                                        <h5 class="case27-secondary-text">' . 
                                            get_comment_author($comment) . '
                                        </h5>   
                                        <span class="comment-date">' .
                                            get_comment_date() . ' at ' . get_comment_time() . '
                                        </span>
                                    </div>
                                    <div class="comment-body">' .     
                                        ci_comment_rating_display_rating($comment_text) . '
                                    </div>                               
                                </div>
                            </li>';
                            
            return $comment_html;

        }

    }