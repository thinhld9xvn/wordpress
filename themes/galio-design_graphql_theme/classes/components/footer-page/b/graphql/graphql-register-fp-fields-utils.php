<?php 

    namespace WP_GraphQL;

    use \FooterPage\FP_FIELDS;
    use \FooterPage\FPGetMetaHeadingUtils;
    use \FooterPage\FPGetMetaContentsUtils;
    use \FooterPage\FPGetMetaButtonTextUtils;
    use \FooterPage\FPGetMetaButtonUrlUtils;

    class GraphQLRegisterFPFieldsUtils {

        public static function register() {

            $field_name = 'getFooterPageData';

            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ]
            ];

            $resolve_callback = function($source, $args, $context, $info) {  

                $lang = !empty($args['lang']) ? $args['lang'] : DEFAULT_LANG;
                return [
                    FP_FIELDS::HEADING_GQL_FIELD => FPGetMetaHeadingUtils::get($lang),
                    FP_FIELDS::CONTENTS_GQL_FIELD => FPGetMetaContentsUtils::get($lang),
                    FP_FIELDS::BUTTON_TEXT_GQL_FIELD => FPGetMetaButtonTextUtils::get($lang),
                    FP_FIELDS::BUTTON_URL_GQL_FIELD => FPGetMetaButtonUrlUtils::get($lang)
                ];

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, FP_FIELDS::FP_SCHEMA_TYPE);    

        }

    }