<?php 

    namespace Products;

    class ProductSearchCategoryUtils {

        public static function search($cat, $cat_lists) {

            $id = -1;

            foreach ($cat_lists as $key => $category) :

                $name = is_array($category) ? $category['name'] : $category->name;
                $_name = is_array($cat) ? $cat['name'] : $cat->name;

                if ( mb_strtolower( trim( $name ), 'UTF-8' ) === mb_strtolower( trim( $_name ), 'UTF-8' ) ) :

                    $id = $key;

                    break;

                endif;
                
            endforeach;

            return $id;

        }

    }