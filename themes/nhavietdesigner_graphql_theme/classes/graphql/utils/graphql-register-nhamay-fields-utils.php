<?php 

    namespace WP_GraphQL;

    use \NhaMayPage\NhaMayGetTitleField;
    use \NhaMayPage\NhaMayGetBannerField;
    use \NhaMayPage\NhaMayGetFooterField;
    use \NhaMayPage\NhaMayGetGalleriesField;
    use \NhaMayPage\NhaMayGetSectionField;
    use \NhaMayPage\NhaMayGetYoutubeVDField;

    class GraphQLRegisterNhaMayFieldsUtils {

        public static function register() {

            $field_name = 'getNhaMayPageOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode([
                    'title' => NhaMayGetTitleField::get(),
                    'banner' => NhaMayGetBannerField::get(),
                    'section1' => NhaMayGetSectionField::get(0),
                    'section2' => NhaMayGetSectionField::get(1),
                    'youtube' => NhaMayGetYoutubeVDField::get(),
                    'footer' => NhaMayGetFooterField::get(),
                    'galleries' => NhaMayGetGalleriesField::get()
                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);    

        }

    }