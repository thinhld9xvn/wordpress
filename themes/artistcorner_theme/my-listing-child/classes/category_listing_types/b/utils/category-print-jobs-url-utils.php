<?php 

    namespace Category_Listing_Types;

    class CategoryPrintJobsUrlUtils {

        public static function print_by_term($term) {

            echo \Category_Listing_Types\CategoryGetJobsUrlUtils::get_by_term($term);
            
        }

    }