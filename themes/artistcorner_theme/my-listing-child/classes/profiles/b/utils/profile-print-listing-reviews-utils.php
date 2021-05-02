<?php 

    namespace Profiles;

    class ProfilePrintListingReviewsUtils {

        public static function print() {

            global $post, $current_user;        
            
            if ( is_user_logged_in() ) :

                if ( (int) $post->post_author !== (int) $current_user->ID ) :

                    print_reviews_logged_in_comments_templates();           
                    
                endif;

            else:

                print_reviews_not_logged_in_comments_templates();

            endif;

        }

    }