<?php 

    namespace Products;

    class ProductGetListsUtils {

        public static function get_by_uid($uid, $limit) {

            $store_shop_name = \Stores\StoreGetMetaShopNameUtils::get($uid);

            $commercants_list = \Commercants\CommercantGetListUtils::get();

            $args = array(

                'post_type' => PRODUCT_FIELDS::PRODUCT_POST_TYPE,
                //'author' => $uid, 
                'posts_per_page' => $limit,
                'meta_key' => PRODUCT_FIELDS::PRODUCT_SHOP_NAME_FIELD,
                'meta_value' => $store_shop_name,
                'meta_compare' => '='

            );

            query_posts($args);

            $product_lists_data = array();

            if ( have_posts() ) :

                while ( have_posts() ) : the_post();

                    global $product;

                    $data = ProductGetDataUtils::get($commercants_list, $product);

                    $product_lists_data[] = $data;

                endwhile;

            endif;

            wp_reset_query();

		    return $product_lists_data;

        }

    }