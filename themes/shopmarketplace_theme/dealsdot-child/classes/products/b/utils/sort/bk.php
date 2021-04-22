<?php 

    namespace Products;

    class ProductSortRevelanceListsInLoopFilterUtils {

        public static function sort($product_lists, $keyword) {

            $arr_revelances = array();
            $arr_unrevelances = array();

            $_keyword = mb_strtolower($keyword, "UTF-8");

            foreach ($product_lists as $key => $product) :

                $name = mb_strtolower($product['name'], "UTF-8");                

                if ( FALSE !== mb_strpos( $name, $_keyword, 0, 'UTF-8' ) ) :

                    array_push($arr_revelances, $product);

                else :

                    array_push($arr_unrevelances, $product);

                endif;
                
            endforeach;

            return array_merge($arr_revelances, $arr_unrevelances);
            //return $arr_revelances;

        }     

    }