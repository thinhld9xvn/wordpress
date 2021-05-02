<?php 

    namespace Profiles;

    class ProfileGetMetaLngTitudeUtils {

        public static function get($post) {

            $listing = MyListing\Src\Listing::get( $post );

            $longitude  = $listing->get_data(_FIELD_JOBS_LOCATION_LNGITUTE);

            return is_numeric($longitude) ? $longitude + ( rand(0, 1000) / 10e6 ) : false;

        }
        
    }