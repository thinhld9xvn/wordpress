<?php 
    namespace WP_GraphQL;
    use \CTInfo\CTINFO_FIELDS;
    use \CTInfo\CTInfoGetContactDescriptionHtmlUtils;
    use \CTInfo\CTInfoGetContactHotlineUtils;
    use \CTInfo\CTInfoGetContactEmailUtils;
    use \CTInfo\CTInfoGetContactEmailRecruitUtils;
    use CTInfo\CTInfoGetContactFormUtils;
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
                $cfid = $lang === DEFAULT_LANG ? CONTACT_FORM_VI_ID : CONTACT_FORM_EN_ID ;
                $cftitle = $lang === DEFAULT_LANG ? CONTACT_FORM_TITLE_VI_ID : CONTACT_FORM_TITLE_EN_ID ;
                $cgiftsid = $lang === DEFAULT_LANG ? GIFTS_FORM_VI_ID : GIFTS_FORM_EN_ID ;
                $cgiftstitle = $lang === DEFAULT_LANG ? GIFTS_FORM_TITLE_VI_ID : GIFTS_FORM_TITLE_EN_ID ;
                return [
                    CTINFO_FIELDS::DESCRIPTION_FIELD => CTInfoGetContactDescriptionHtmlUtils::get($lang),
                    CTINFO_FIELDS::HOTLINE_FIELD => CTInfoGetContactHotlineUtils::get(),
                    CTINFO_FIELDS::EMAIL_FIELD => CTInfoGetContactEmailUtils::get(),
                    CTINFO_FIELDS::EMAIL_RECRUIT_FIELD => CTInfoGetContactEmailRecruitUtils::get(),
                    CTINFO_FIELDS::CONTACT_FORM_FIELD => CTInfoGetContactFormUtils::get($cfid, $cftitle),
                    CTINFO_FIELDS::GIFTS_FORM_FIELD => CTInfoGetContactFormUtils::get($cgiftsid, $cgiftstitle)
                ];
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, CTINFO_FIELDS::CTINFO_SCHEMA_TYPE);    
        }
    }