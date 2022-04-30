<?php 

    namespace WP_GraphQL;

    class GraphQLRegisterPagesListFieldsUtils {

        public static function register() {

            $field_name = 'getPagesListOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {    
                
                return json_encode(\Pages\PagesGetAllListsUtils::get());

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }