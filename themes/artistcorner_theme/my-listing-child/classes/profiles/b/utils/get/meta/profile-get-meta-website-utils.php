<?php 
    
    namespace Profiles;

    class ProfileGetMetaWebsiteUtils {

        public static function get($post) {
            
            $listing = MyListing\Src\Listing::get( $post );   
        
            return $listing->get_field(_FIELD_JOBS_COMPANY_WEBSITE);


        }

    }