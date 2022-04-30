<?php 
    namespace WP_GraphQL;
    use \CTInfo\CTINFO_FIELDS;
    use CTInfo\CTInfoGetContactAddressUtils;
    use CTInfo\CTInfoGetContactCopyrightUtils;
    use \CTInfo\CTInfoGetContactHotlineUtils;
    use \CTInfo\CTInfoGetContactEmailUtils;
    use CTInfo\CTInfoGetContactIntroUtils;
    use CTInfo\CTInfoGetContactSupporterUtils;
    use CTInfo\CTInfoGetContactWebsiteUtils;
    use CTInfo\CTInfoGetDefaultBannerPageUtils;
    use CTInfo\CTInfoGetIntroBgUtils;
    use CTInfo\CTInfoGetSocialUtils;

    class GraphQLRegisterCtInfoFieldsUtils {
        public static function register() {
            $field_name = 'getCtInfoList';
            $args = [
                'lang' => [
                    'type' => 'LanguageCodeEnum'
                ]
            ];
            $resolve_callback = function($source, $args, $context, $info) {              
                $lang = !empty( $args['lang'] ) ? $args['lang'] : DEFAULT_LANG;
                return [
                    CTINFO_FIELDS::INTRODUCTION_FIELD => CTInfoGetContactIntroUtils::get($lang),
                    CTINFO_FIELDS::INTRODUCTION_BG_FIELD => CTInfoGetIntroBgUtils::get(),
                    CTINFO_FIELDS::ADDRESS_FIELD => CTInfoGetContactAddressUtils::get($lang),
                    CTINFO_FIELDS::SUPPORTER_FIELD => CTInfoGetContactSupporterUtils::get($lang),
                    CTINFO_FIELDS::HOTLINE_FIELD => CTInfoGetContactHotlineUtils::get(),
                    CTINFO_FIELDS::EMAIL_FIELD => CTInfoGetContactEmailUtils::get(),
                    CTINFO_FIELDS::WEBSITE_FIELD => CTInfoGetContactWebsiteUtils::get(),                    
                    CTINFO_FIELDS::COPYRIGHT_FIELD => CTInfoGetContactCopyrightUtils::get(),
                    CTINFO_FIELDS::SOCIALS_FIELD => CTInfoGetSocialUtils::get(),
                    CTINFO_FIELDS::DEFAULT_BANNER_FIELD => CTInfoGetDefaultBannerPageUtils::get()
                ];
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, CTINFO_FIELDS::CTINFO_SCHEMA_TYPE);    
        }
    }