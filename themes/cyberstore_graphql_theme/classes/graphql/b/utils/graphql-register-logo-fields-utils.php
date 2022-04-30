<?php 

    namespace WP_GraphQL;

    class GraphQLRegisterLogoFieldsUtils {

        public static function register() {

            $field_name = 'getLogoImageOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {    
                
                $primary_url = \Logo\LogoGetPrimaryUrlUtils::get();
                //$mobile_url = \Logo\LogoGetMobileUrlUtils::get();        
                //$footer_url = \Logo\LogoGetFooterUrlUtils::get();       
               
                return json_encode([
                    'primary' => [
                       'id' => 'primary_logo',
                       'image' => $primary_url,
                       'url' => '/',
                       'alt' => 'logo'
                    ],
                    /*'mobile' => [
                        'src' => $mobile_url,
                        'url' => '/',
                        'alt' => 'logo'
                    ],
                    'footer' => [
                        'src' => $footer_url,
                        'url' => '/',
                        'alt' => 'logo'
                    ]*/
                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }