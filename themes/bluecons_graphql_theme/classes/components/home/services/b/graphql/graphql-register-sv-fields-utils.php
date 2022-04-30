<?php 
    namespace WP_GraphQL;
    use \Home\Services\SERVICES_FIELDS;
    use Home\Services\SVGetHomeDataUtils;
    class GraphQLRegisterSVFieldsUtils {
        public static function register() {
            $field_name = 'getSVSectionInfo';
            $args = [];
            $resolve_callback = function($source, $args, $context, $info) { 
                return SVGetHomeDataUtils::get();
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, SERVICES_FIELDS::SV_SCHEMA_TYPE);    
        }
    }