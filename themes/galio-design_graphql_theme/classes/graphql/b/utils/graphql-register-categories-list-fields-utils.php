<?php 

    namespace WP_GraphQL;

    class GraphQLRegisterCategoriesListFieldsUtils {

        public static function register() {

            $field_name = 'getCategoriesListOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {    
                
                return json_encode(\Categories\CategoryGetAllListsUtils::get());

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }