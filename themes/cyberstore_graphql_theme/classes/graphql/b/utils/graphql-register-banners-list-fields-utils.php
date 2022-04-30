<?php 

    namespace WP_GraphQL;

    use \Banners\BannersGetListUtils;
  
    class GraphQLRegisterBannersListFieldsUtils {

        public static function register() {

            $field_name = 'getBannersListOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode(BannersGetListUtils::get());

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }