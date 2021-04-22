<?php

    namespace Actions\Woocommerce;

    class ActionWooCommerceCustomizeSingleProductSummaryUtils {

        public static function init($tabs) {

            global $product;

            $commercants_list = \Commercants\CommercantGetListUtils::get(); 
    
            $_shop_name = get_post_meta($product->get_id(), 'shop_name', true);
    
            //$shop_name = str_replace( "\'", "'", $_shop_name );
    
            //$_shop_name = str_replace( "\\\"", "\"", $shop_name );  
    
            //$shop_name = str_replace( "\\\"", "'", $shop_name );
    
            $shop_name = \Commercants\CommercantGetShopNameUtils::get_by_format( $_shop_name );
    
            \Commercants\CommercantPrintShopInformationUtils::print($commercants_list, $shop_name, $_shop_name);

        }

    }


