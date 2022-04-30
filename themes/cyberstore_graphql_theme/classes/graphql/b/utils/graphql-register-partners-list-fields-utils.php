<?php 

    namespace WP_GraphQL;

    use \Partners\PartnersGetLogosListUtils;

    class GraphQLRegisterPartnersListFieldsUtils {

        public static function register() {

            $field_name = 'getPartnersListOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode(PartnersGetLogosListUtils::get());

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }