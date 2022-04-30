<?php 
    namespace WP_GraphQL;
    use \Home\Products\PRODUCTS_FIELDS;
    use \Home\Products\PDGetHomeDataUtils;
    class GraphQLRegisterProductsFieldsUtils {
        public static function register() {
            $field_name = 'getPdSectionInfo';
            $args = [];
            $resolve_callback = function($source, $args, $context, $info) { 
                return PDGetHomeDataUtils::get();
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, PRODUCTS_FIELDS::PRODUCTS_SCHEMA_TYPE);    
        }
    }