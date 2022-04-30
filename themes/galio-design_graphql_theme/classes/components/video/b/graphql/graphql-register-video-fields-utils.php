<?php 

    namespace WP_GraphQL;

    use \Video\VIDEO_FIELDS;
    use \Video\VideoGetAllItemsUtils;

    class GraphQLRegisterVideoFieldsUtils {

        public static function register() {

            $field_name = 'getVideoList';

            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ]
            ];

            $resolve_callback = function($source, $args, $context, $info) {

                $lang = !empty($args['lang']) ? $args['lang'] : DEFAULT_LANG;

                return VideoGetAllItemsUtils::get($lang);      

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, 
                                                    $resolve_callback, 
                                                        ['list_of' => VIDEO_FIELDS::VIDEO_SCHEMA_TYPES]);    

        }

    }