<?php 

    namespace Products;

    class ProductSetMapShopNameUtils {

        public static function map_by_category_id($shop_name, $cid) {

            $shop_name = \Commercants\CommercantGetShopNameUtils::get_by_format($shop_name, 'lowercase');
            $cid = (int) $cid;

            $shop_lists_map = get_option(__COM_SHOP_MAP_CATEGORIES);
            $shop_lists_map = is_null( $shop_lists_map ) || empty( $shop_lists_map ) ? array() : json_decode( $shop_lists_map, true );

            if ( ! array_key_exists($shop_name, $shop_lists_map) ) :

                $shop_lists_map[$shop_name] = array();

            endif;

            $term = get_term_by('id', $cid, 'product_cat');

            if ( -1 === \Products\ProductSearchCategoryUtils::search( $term, $arrShopListsCInfo[$shop_name] ) ) :									

                $shop_lists_map[$shop_name][] = array(

                    'id' => $term->term_id,
                    'name' => $term->name,
                    'permalink' => get_term_link( $term )

                );

            endif;	
            
            update_option(__COM_SHOP_MAP_CATEGORIES, json_encode($shop_lists_map));  

        }

    }