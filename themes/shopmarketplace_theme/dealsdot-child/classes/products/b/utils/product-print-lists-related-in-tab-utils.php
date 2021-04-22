<?php 

    namespace Products;

    class ProductPrintListsRelatedInTabUtils {

        public static function print() {
            
            global $product;

            $pid = $product->get_id();

            $txtShopName = get_post_meta($pid, 'shop_name', true);

            $num_items = 6;

            $args = array(

                'post_type' => 'product',			
                'orderby' => 'date',
                'order' => 'DESC',
                'post__not_in' => array($pid),
                'meta_key' => 'shop_name',
                'meta_value' => $txtShopName, 		    
                'posts_per_page' => $num_items

            );

            ProductPrintListsRelatedUtils::print( $args );

        }

    }