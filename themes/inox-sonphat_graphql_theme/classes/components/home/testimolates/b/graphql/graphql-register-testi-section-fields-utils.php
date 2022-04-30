<?php 
    namespace WP_GraphQL;
    use Home\Testimolates\GetTestimolatesSectionUtils;
    use Home\Testimolates\TESTIMOLATES_FIELDS;
    class GraphQLRegisterTestiSectionFieldsUtils {
        public static function register() {
            $field_name = 'getTestimolatesSectionInfo';
            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ]
            ];
            $resolve_callback = function($source, $args, $context, $info) {    
                return GetTestimolatesSectionUtils::get(! empty( $args['lang'] ) ? $args['lang'] : DEFAULT_LANG);
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, TESTIMOLATES_FIELDS::TESTIMOLATES_SCHEMA_TYPE);    
        }
    }