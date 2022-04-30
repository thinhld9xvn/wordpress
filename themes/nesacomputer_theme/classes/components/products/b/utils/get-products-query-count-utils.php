<?php 
    namespace Products;
    class GetProductsQueryCountUtils {
        public static function get() {
            global $wp_query;
            return $wp_query->found_posts;
        }
    }