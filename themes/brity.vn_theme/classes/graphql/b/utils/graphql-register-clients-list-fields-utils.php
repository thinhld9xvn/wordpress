<?php 
    namespace WP_GraphQL;

    use \Clients\ClientGetAllListsUtils;

    class GraphQLRegisterClientsListFieldsUtils {

        public static function register() {

            $field_name = 'getClientsListOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {   

                return json_encode(ClientGetAllListsUtils::get());

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);

        }

    }