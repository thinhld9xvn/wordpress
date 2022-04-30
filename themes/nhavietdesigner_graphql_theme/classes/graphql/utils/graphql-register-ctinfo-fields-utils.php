<?php 

    namespace WP_GraphQL;

    use \Theme_Options\ThemeOptionGetCopyrightUtils;
    use \Theme_Options\ThemeOptionGetSocialUtils;


    class GraphQLRegisterCtInfoFieldsUtils {

        public static function register() {

            $field_name = 'getCtInfoOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {   
                
                ob_start();

                dynamic_sidebar( 'footer-one' );

                $intro_html = ob_get_contents();

                ob_end_clean();
               
                return json_encode([
                    'intro_html' => $intro_html,
                    'copyright' => ThemeOptionGetCopyrightUtils::get(),
                    'social' => ThemeOptionGetSocialUtils::get()
                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }