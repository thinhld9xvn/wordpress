<?php 

    namespace Profiles;

    class ProfileGetMetaShortContactLocationUtils {

        public static function get($post) {

            $location = get_profile_contact_location($post);
            $pieces = explode(',', $location);

            return sizeof( $pieces ) > 0 ? $pieces[0] : $location;


        }

    }