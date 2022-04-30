<?php 

    namespace WP_GraphQL;

    use \Products\ProductsGetAttributesListUtils;
  
    class GraphQLRegisterProductsAttributesListFieldsUtils {

        public static function register() {

            $field_name = 'getProductsAttributesListOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode(ProductsGetAttributesListUtils::get());

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }