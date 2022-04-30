<?php 
    namespace WP_GraphQL;
    use \Home\Knowledges\KL_FIELDS;
    use Home\Knowledges\KLGetHomeDataUtils;
    class GraphQLRegisterKLFieldsUtils {
        public static function register() {
            $field_name = 'getKTSectionInfo';
            $args = [];
            $resolve_callback = function($source, $args, $context, $info) { 
                return KLGetHomeDataUtils::get();
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, KL_FIELDS::KL_SCHEMA_TYPE);    
        }
    }