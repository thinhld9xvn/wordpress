<?php 
    namespace WP_GraphQL;
    use Home\Clients\CLIENTS_FIELDS;
    use Home\Clients\ClientsGetAllItemsUtils;
    class GraphQLRegisterClientsFieldsUtils {
        public static function register() {
            $field_name = 'getClientsSectionInfo';
            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ]
            ];
            $resolve_callback = function($source, $args, $context, $info) { 
                $lang = !empty( $args['lang'] ) ? $args['lang'] : DEFAULT_LANG;
                return ClientsGetAllItemsUtils::get($lang);
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, ['list_of' => CLIENTS_FIELDS::CLIENTS_SCHEMA_TYPE]);    
        }
    }