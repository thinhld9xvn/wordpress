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
            $args = [];
            $resolve_callback = function($source, $args, $context, $info) { 
                return [
                    GIOITHIEU_FIELDS::HEADING_GQL_FIELD => GTGetMetaHeadingUtils::get(),
                    GIOITHIEU_FIELDS::BACKGROUND_GQL_FIELD => GTGetMetaBackgroundImageUtils::get(),
                    GIOITHIEU_FIELDS::CONTENTS_GQL_FIELD => GTGetMetaContentsColumnUtils::get(),
                    GIOITHIEU_FIELDS::BUTTON_TEXT_GQL_FIELD => GTGetMetaButtonTextUtils::get(),
                    GIOITHIEU_FIELDS::BUTTON_URL_GQL_FIELD => GTGetMetaButtonUrlUtils::get()
                ];
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, GIOITHIEU_FIELDS::GT_SCHEMA_TYPE);    
        }
    }