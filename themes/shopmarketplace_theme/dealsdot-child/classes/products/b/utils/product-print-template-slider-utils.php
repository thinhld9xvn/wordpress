<?php 

    namespace Products;

    class ProductPrintTemplateSliderUtils {

        public static function print() {

            global $product;

            echo file_get_contents(ProductPrintTemplateUtils::print($product));
    
            //echo get_woocommerce_product_template();     

        }

    }