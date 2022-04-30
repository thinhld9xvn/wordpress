<?php 

    namespace WP_GraphQL;

    use \Products\ProductsGetAllListsUtils;
  
    class GraphQLRegisterProductsListsFieldsUtils {

        public static function register() {

            $field_name = 'getProductsListsOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode(ProductsGetAllListsUtils::get());

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }