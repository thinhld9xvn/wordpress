<?php 

    namespace Profiles;

    class ProfileGetMetaContactLocationUtils {

        public static function get($post) {

            $listing = MyListing\Src\Listing::get( $post );

            return $listing->get_field(_FIELD_JOBS_CONTACT_LOCATION);


        }

    }