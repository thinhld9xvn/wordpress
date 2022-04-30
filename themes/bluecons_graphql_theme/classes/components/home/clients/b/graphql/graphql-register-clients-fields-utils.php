<?php 
    namespace WP_GraphQL;
    use Home\Clients\CLIENTS_FIELDS;
    use Home\Clients\ClientsGetHomeDataUtils;
    class GraphQLRegisterClientsFieldsUtils {
        public static function register() {
            $field_name = 'getClientsSectionInfo';
            $args = [];
            $resolve_callback = function($source, $args, $context, $info) { 
                return ClientsGetHomeDataUtils::get();
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, CLIENTS_FIELDS::CLIENTS_SCHEMA_TYPE);    
        }
    }