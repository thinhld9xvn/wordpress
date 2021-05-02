<?php 

    namespace Category_Listing_Types;

    class CategoryGetIdsUtils {

        public static function get_by_term($term) {

            return get_field(_FIELD_CATEGORY_TYPE_IDS, $term);

        }

    }