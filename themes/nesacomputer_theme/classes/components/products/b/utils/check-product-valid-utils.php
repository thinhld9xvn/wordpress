<?php 
    namespace Products;
    class CheckProductValidUtils {
        public static function valid($product) {
            if ( empty($product->regular_price) || empty($product->sale_price) ) return false;
            return true;
        }
    }