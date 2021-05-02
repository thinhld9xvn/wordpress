<?php 

    namespace Category_Listing_Types;

    class CategoryGetJobsUrlUtils {

        public static function get_by_term($term) {

            $url = EXPLORE_CATEGORY_JOBS_URL;

            $url = preg_replace("/\%term_slug\%/", $term->slug, $url);
    
            return $url;

        }

    }