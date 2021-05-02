<?php 

    namespace Category_Listing_Types;

    class CategoryCheckJobsUtils {

        public static function has_by_ids($ids) {

            foreach ( $ids as $id ) :

                if ( mb_strtolower( get_post($id)->post_title, 'UTF-8' ) === 'jobs' ) return true;
    
            endforeach; 
    
            return false;

        }
        
    }