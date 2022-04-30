<?php 
    namespace WP_GraphQL;
    use \Home\GioiThieu\GIOITHIEU_FIELDS;
    use Home\GioiThieu\GTGetMetaBackgroundImageUtils;
    use \Home\GioiThieu\GTGetMetaHeadingUtils;
    use \Home\GioiThieu\GTGetMetaContentsColumnUtils;
    use \Home\GioiThieu\GTGetMetaButtonTextUtils;
    use \Home\GioiThieu\GTGetMetaButtonUrlUtils;
    class GraphQLRegisterGTFieldsUtils {
        public static function register() {
            $field_name = 'getGTSectionInfo';
            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ]
            ];
            $resolve_callback = function($source, $args, $context, $info) { 
                $lang = !empty( $args['lang'] ) ? $args['lang'] : DEFAULT_LANG;
                return [
                    GIOITHIEU_FIELDS::HEADING_FIELD => GTGetMetaHeadingUtils::get($lang),
                    GIOITHIEU_FIELDS::BACKGROUND_URL_FIELD => GTGetMetaBackgroundImageUtils::get(),
                    GIOITHIEU_FIELDS::CONTENTS_FIELD => GTGetMetaContentsColumnUtils::get($lang),
                    GIOITHIEU_FIELDS::BUTTON_TEXT_FIELD => GTGetMetaButtonTextUtils::get($lang),
                    GIOITHIEU_FIELDS::BUTTON_URL_FIELD => GTGetMetaButtonUrlUtils::get($lang)
                ];
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, GIOITHIEU_FIELDS::GT_SCHEMA_TYPE);    
        }
    }