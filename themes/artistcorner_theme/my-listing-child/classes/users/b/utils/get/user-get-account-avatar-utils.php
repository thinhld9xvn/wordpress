<?php 

    namespace Users;

    class UserGetAccountAvatarUtils {

        public static function get() {

            global $current_user;
            
            return get_usermeta($current_user->ID, _FIELD_USER_PROFILE_PHOTO_URL);

        }

        public static function get_url($uid) {

            global $post;

            $listing = MyListing\Src\Listing::get( $post );

            $avatar = $listing->get_field(_FIELD_USER_PROFILE_PHOTO_URL);           

            return $avatar ? $avatar : get_avatar_url($uid);

        }

    }