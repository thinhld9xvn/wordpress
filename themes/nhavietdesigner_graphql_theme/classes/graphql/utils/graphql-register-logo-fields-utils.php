<?php 

    namespace WP_GraphQL;

    class GraphQLRegisterLogoFieldsUtils {

        public static function register() {

            $field_name = 'getLogoImageOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode([
                    'src' => wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0],
                    'alt' => 'logo',
                    'url' => '/'
                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }