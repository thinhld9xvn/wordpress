<?php 

    namespace Products;

    class ProductGetDataUtils {

        public static function get($commercants_list, $product) {

            $product_id = $product->get_id();

            $shop_name = \Commercants\CommercantGetShopNameUtils::get_by_pid($product_id, 'uppercase');            
                    
            $id = \Commercants\CommercantSearchShopUtils::search_id($commercants_list, $shop_name) + 1;                        

            $url = \Urls\UrlGetStoreDetailsPageUtils::get() . $id;  

            $isPriceFrom = get_post_meta($product_id, 'bool_from_price', true);

            //$url = "//{$_SERVER['SERVER_NAME']}/commerce/{$shop_name_in_url}";

            $galleries_id = get_post_meta($product_id, '_product_image_gallery', true);

            return array(

                'id' => $product_id,
                'name' => $product->get_name(),
                'permalink' => $product->get_permalink(),
                'price' => $product->regular_price,
                'price_html' => $product->get_price_html(),
                'is_price_from' => $isPriceFrom === 'yes',
                'galleries_id' => $galleries_id,
                'featured_image' => get_the_post_thumbnail($product_id, 'full'),
                'categories' => $product->get_category_ids(),
                'shop_name' => $shop_name,
                'url_shop_name' => $url
                
            );            

        }

    }