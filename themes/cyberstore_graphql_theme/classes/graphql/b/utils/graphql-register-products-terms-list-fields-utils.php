<?php 

    namespace WP_GraphQL;

    use \Products\ProductsGetAllTermsListUtils;
  
    class GraphQLRegisterProductsTermsListFieldsUtils {

        public static function register() {

            $field_name = 'getProductsTermsListOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode(ProductsGetAllTermsListUtils::get());

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }