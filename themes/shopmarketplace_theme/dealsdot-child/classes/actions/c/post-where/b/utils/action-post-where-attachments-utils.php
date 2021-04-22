<?php

    namespace Actions\Post_Where;

    class ActionPostWhereAttachmentsUtils {

        public static function init($where) {

            global $current_user;

            if( is_user_logged_in() ) :	    	
    
                // logged in user, but are we viewing the library?
                if( isset( $_POST['action'] ) && ( $_POST['action'] == 'query-attachments' ) ) :
    
                    if ( ! current_user_can('administrator') ) :
    
                        // not show any media
                        $where .= ' AND post_author=' . $current_user->ID;
    
                    else :
    
    
                    endif;
    
                endif;
    
            endif;
    
            return $where;

        }

    }


