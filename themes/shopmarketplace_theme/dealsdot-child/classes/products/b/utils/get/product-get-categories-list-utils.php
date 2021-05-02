<?php 

    namespace Products;

    class ProductGetCategoriesListUtils {

        public static function get() {

            $args = array(

                'taxonomy' => PRODUCT_TAXONOMY,
                'hide_empty' => 0

            );

            return get_terms($args);
       

        }

    }