<?php 

    namespace WP_GraphQL;

    class GraphQLRegisterArticlesListFieldsUtils {

        public static function register() {

            $field_name = 'getArticlesListOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {    
                
                return json_encode(\Posts\PostsGetAllListsUtils::get());

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }