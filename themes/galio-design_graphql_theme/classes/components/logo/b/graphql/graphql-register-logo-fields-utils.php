<?php 

    namespace WP_GraphQL;

    use \Logo\LOGO_FIELDS;
    use \Logo\LogoGetPrimaryUrlUtils;

    class GraphQLRegisterLogoFieldsUtils {

        public static function register() {

            $field_name = 'getLogoSite';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {    
                
                $primary_url = LogoGetPrimaryUrlUtils::get();
               
                return [
                    LOGO_FIELDS::LOGO_SRC => $primary_url,
                    LOGO_FIELDS::LOGO_ALT => 'logo',
                    LOGO_FIELDS::LOGO_URL => '/'
                ];

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, LOGO_FIELDS::LOGO_SCHEMA_TYPE);    

        }

    }