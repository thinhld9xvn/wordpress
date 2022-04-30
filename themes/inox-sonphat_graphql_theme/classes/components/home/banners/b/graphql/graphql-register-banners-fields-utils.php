<?php 
    namespace WP_GraphQL;
    use Home\Banners\BANNERS_FIELDS;
    use Home\Banners\BannersGetBackgroundUtils;
    use Home\Banners\BannersGetFeaturedImageUtils;
    use Home\Banners\BannersGetHeadingUtils;
    use Home\Banners\BannersGetHotlineUrlUtils;
    use Home\Banners\BannersGetHotlineUtils;
    class GraphQLRegisterBannersFieldsUtils {
        public static function register() {
            $field_name = 'getBannersSectionInfo';
            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ],
                'pos' => [
                    'type' => 'Int'
                ]
            ];
            $resolve_callback = function($source, $args, $context, $info) { 
                $lang = !empty( $args['lang'] ) ? $args['lang'] : DEFAULT_LANG;
                $pos = !empty( $args['pos'] ) ? intval($args['pos']) : 0;
                return [
                    BANNERS_FIELDS::HEADING1_FIELD => BannersGetHeadingUtils::get(0, $pos, $lang),
                    BANNERS_FIELDS::HEADING2_FIELD => BannersGetHeadingUtils::get(1, $pos, $lang),
                    BANNERS_FIELDS::HOTLINE_FIELD => BannersGetHotlineUtils::get($pos, $lang),
                    BANNERS_FIELDS::HOTLINE_URL_FIELD => BannersGetHotlineUrlUtils::get($pos, $lang),
                    BANNERS_FIELDS::BACKGROUND_FIELD => BannersGetBackgroundUtils::get($pos),
                    BANNERS_FIELDS::FEATURED_IMAGE_FIELD => BannersGetFeaturedImageUtils::get($pos)
                ];
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, BANNERS_FIELDS::BANNERS_SCHEMA_TYPE);    
        }
    }