<?php 

    namespace Profiles;

    class ProfileGetMetaLatitudeUtils {

        public static function get($post) {

            $listing = MyListing\Src\Listing::get( $post );   
        
            $latitute = $listing->get_data(_FIELD_JOBS_LOCATION_LATITUDE);

            return is_numeric($latitute) ? $latitute + ( rand(0, 1000) / 10e6 ) : false;


        }

    }