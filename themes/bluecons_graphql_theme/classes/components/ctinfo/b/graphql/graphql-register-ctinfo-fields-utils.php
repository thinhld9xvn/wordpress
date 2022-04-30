<?php 
    namespace WP_GraphQL;
    use \CTInfo\CTINFO_FIELDS;
    use CTInfo\CTInfoGetContactAddressUtils;
    use CTInfo\CTInfoGetContactFormUtils;
    use CTInfo\CTInfoGetCopyrightUtils;
    use CTInfo\CTInfoGetDefaultBannerUtils;
    use CTInfo\CTInfoGetFooterMenuUtils;
    use CTInfo\CTInfoGetInfoMenuUtils;
    use CTInfo\CTInfoGetSocialUtils;
    use CTInfo\CTInfoGetSupporterUtils;
    class GraphQLRegisterCtInfoFieldsUtils {
        public static function register() {
            $field_name = 'getCtInfoList';
            $args = [
                "ctform_id" => [
                    'type' => 'String'
                ],
                "ctform_title" => [
                    'type' => 'String'
                ],
            ];
            $resolve_callback = function($source, $args, $context, $info) {   
                $ctform_id = !empty( $args['ctform_id'] ) ? $args['ctform_id'] : CTFORM_ID;
                $ctform_title = !empty( $args['ctform_title'] ) ? $args['ctform_title'] : CTFOMR_TITLE;
                return [
                    CTINFO_FIELDS::CONTACT_GQL_FIELD => CTInfoGetContactAddressUtils::get(),
                    CTINFO_FIELDS::COPYRIGHT_GQL_FIELD => CTInfoGetCopyrightUtils::get(),
                    CTINFO_FIELDS::FOOTER_MENU_GQL_FIELD => CTInfoGetFooterMenuUtils::get(),
                    CTINFO_FIELDS::FOOTER_INFO_GQL_FIELD => CTInfoGetInfoMenuUtils::get(),
                    CTINFO_FIELDS::FOOTER_SOCIALS_GQL_FIELD => CTInfoGetSocialUtils::get(),
                    CTINFO_FIELDS::FOOTER_SUPPORTER_GQL_FIELD => CTInfoGetSupporterUtils::get(),
                    CTINFO_FIELDS::DEFAULT_BANNER_GQL_FIELD => CTInfoGetDefaultBannerUtils::get(),
                    CTINFO_FIELDS::CONTACT_FORM_FIELD => CTInfoGetContactFormUtils::get($ctform_id, $ctform_title)
                ];
            };
            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback, CTINFO_FIELDS::CTINFO_SCHEMA_TYPE);    
        }
    }