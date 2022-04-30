<?php 

    namespace WP_GraphQL;

    use \Home\LHTK\LHTK_FIELDS;
    use Home\LHTK\LHTKGetMetaBackgroundUtils;
    use \Home\LHTK\LHTKGetMetaHeadingUtils;
    use \Home\LHTK\LHTKGetMetaContentsUtils;
    use \Home\LHTK\LHTKGetMetaButtonTextUtils;
    use \Home\LHTK\LHTKGetMetaButtonUrlUtils;

    class GraphQLRegisterLHTKFieldsUtils {

        public static function register() {

            $field_name = 'getLHTKSectionInfo';

            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ]
            ];

            $resolve_callback = function($source, $args, $context, $info) { 

                $lang = !empty( $args['lang'] ) ? $args['lang'] : DEFAULT_LANG;
               
                return [
                    LHTK_FIELDS::HEADING_FIELD => LHTKGetMetaHeadingUtils::get($lang),
                    LHTK_FIELDS::CONTENTS_FIELD => LHTKGetMetaContentsUtils::get($lang),
                    LHTK_FIELDS::BUTTON_TEXT_FIELD => LHTKGetMetaButtonTextUtils::get($lang),
                    LHTK_FIELDS::BUTTON_URL_FIELD => LHTKGetMetaButtonUrlUtils::get($lang),
                    LHTK_FIELDS::BACKGROUND_FIELD => LHTKGetMetaBackgroundUtils::get($lang)
                ];

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, LHTK_FIELDS::LHTK_SCHEMA_TYPE);    

        }

    }