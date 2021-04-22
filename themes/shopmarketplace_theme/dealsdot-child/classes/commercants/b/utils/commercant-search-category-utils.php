<?php 

    namespace Commercants;

    class CommercantSearchCategoryUtils {

        public static function search_by_id($categoriesList, $id) {
           
            foreach ($categoriesList as $key => $category) :

                if ( $key === $id ) return $key;
                        
            endforeach;

            return -1;

        }

    }