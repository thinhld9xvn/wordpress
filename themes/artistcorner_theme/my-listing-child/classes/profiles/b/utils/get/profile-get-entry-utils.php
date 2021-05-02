<?php 

    namespace Profiles;

    class ProfileGetEntryUtils {

        public static function get($uid) {

            $profile = null;

            $args = array(
                'post_type' => JOBS_POST_TYPE,
                'posts_per_page' => 1,
                'author' => $uid,
                'meta_key' => _FIELD_JOBS_TYPE_KEY,
                'meta_value' => _FIELD_JOBS_TYPE_VALUE            
            ); 
            
            query_posts($args); 

            if ( have_posts() ) :

                while ( have_posts() ) : the_post();

                    global $post;

                    $profile = $post; 

                endwhile;

            endif;

            wp_reset_query();

            return $profile;

        }

    }