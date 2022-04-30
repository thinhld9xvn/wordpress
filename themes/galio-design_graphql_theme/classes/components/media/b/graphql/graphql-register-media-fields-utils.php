<?php 

    namespace WP_GraphQL;

    use \Media\MEDIA_FIELDS;
    use \Media\MediaGetAllItemsUtils;

    class GraphQLRegisterMediaFieldsUtils {

        public static function register() {

            $field_name = 'getMediaList';

            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ]
            ];

            $resolve_callback = function($source, $args, $context, $info) {

                $lang = !empty($args['lang']) ? $args['lang'] : DEFAULT_LANG;

                return MediaGetAllItemsUtils::get($lang);      

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, 
                                                    $resolve_callback, 
                                                        ['list_of' => MEDIA_FIELDS::MEDIA_SCHEMA_TYPES]);    

        }

    }