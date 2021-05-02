<?php 

    namespace Category_Listing_Types;

    class CategoryGetListsUtils {

        public static function get() {

            $args = array(
                'taxonomy' => JOBS_TAXONOMY,
                'hide_empty' => false
            );
    
            return get_terms($args);

        }

    }