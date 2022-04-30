<?php 

    namespace WP_GraphQL;

    class GraphQLRegisterLogoFieldsUtils {

        public static function register() {

            $field_name = 'getLogoImageOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {    
                
                $primary_url = \Logo\LogoGetPrimaryUrlUtils::get();
               
                return json_encode([
                    'primary' => [
                       'src' => $primary_url,
                       'url' => '/',
                       'alt' => 'logo'
                    ]                   
                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }