<?php 

    namespace Profiles;

    class ProfileGetMetaAuthorNameUtils {

        public static function get($post) {

            $first_name = get_usermeta($post->post_author, 'first_name');
            $last_name = substr(get_usermeta($post->post_author, 'last_name'), 0, 1) . '.';
    
            return $first_name . ' ' . $last_name;

        }

    }