<?php 

    namespace Profiles;

    class ProfileGetMetaGalleriesUtils {

        public static function get($post) {

            $listing = MyListing\Src\Listing::get( $post );   
        
            return $listing->get_field(_FIELD_JOBS_GALLERIES);

        }

    }