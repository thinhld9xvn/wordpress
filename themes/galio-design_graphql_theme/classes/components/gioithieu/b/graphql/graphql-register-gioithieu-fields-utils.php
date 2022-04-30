<?php 

    namespace WP_GraphQL;

    use \GioiThieuPage\GIOITHIEU_FIELDS;
    use \GioiThieuPage\GioiThieuGetPageMetaDataUtils;

    class GraphQLRegisterGioiThieuFieldsUtils {

        public static function register() {

            $field_name = 'getGioiThieuPageData';

            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ]
            ];

            $resolve_callback = function($source, $args, $context, $info) {  

                return GioiThieuGetPageMetaDataUtils::get(!empty($args['lang']) ? $args['lang'] : DEFAULT_LANG);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, GIOITHIEU_FIELDS::GIOITHIEU_SCHEMA_TYPE);    

        }

    }