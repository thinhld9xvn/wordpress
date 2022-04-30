<?php 
    namespace WP_GraphQL;
    use Home\Testimolates\GetTestimolatesItemsUtils;
    use Home\Testimolates\TESTIMOLATES_FIELDS;
    class GraphQLRegisterTestiFieldsUtils {
        public static function register() {
            $field_name = 'getTestimolatesItemsList';
            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ]
            ];
            $resolve_callback = function($source, $args, $context, $info) {    
                return GetTestimolatesItemsUtils::get(! empty( $args['lang'] ) ? $args['lang'] : DEFAULT_LANG);
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, ['list_of' => TESTIMOLATES_FIELDS::TESTIMOLATES_FIELDS_TYPE]);    
        }
    }