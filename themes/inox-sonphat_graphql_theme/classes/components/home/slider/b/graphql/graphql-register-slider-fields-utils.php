<?php 
    namespace WP_GraphQL;
    use \Home\Slider\SLIDER_FIELDS;
    use \Home\Slider\getSliderItemsUtils;
    class GraphQLRegisterSliderFieldsUtils {
        public static function register() {
            $field_name = 'getSliderItemsList';
            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ]
            ];
            $resolve_callback = function($source, $args, $context, $info) {    
                return getSliderItemsUtils::get(! empty( $args['lang'] ) ? $args['lang'] : DEFAULT_LANG);
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, ['list_of' => SLIDER_FIELDS::SLIDER_FIELDS_TYPE]);    
        }
    }