<?php 

    namespace WP_GraphQL;

    use \Home\HomeGetVideoUrlUtils;
    use \Home\HomeGetShopBannerUtils;
    use \Home\HomeGetSliderSectionOptionsUtils;
    use \Home\HomeGetSliderSectionUtils;

    class GraphQLRegisterHomeFieldsUtils {

        public static function register() {

            $field_name = 'getHomePageOption';

            $args = [];

            $resolve_callback = function($source, $args, $context, $info) {              
               
                return json_encode([
                    'video_url' => HomeGetVideoUrlUtils::get(),
                    'shop_banner' => HomeGetShopBannerUtils::get(),
                    'slider_section_one' => HomeGetSliderSectionUtils::get(0),
                    'slider_section_one_options' => HomeGetSliderSectionOptionsUtils::get(0),
                    'slider_section_two' => HomeGetSliderSectionUtils::get(1),
                    'slider_section_two_options' => HomeGetSliderSectionOptionsUtils::get(1)
                ]);

            };

            GraphQLRegisterFieldsUtils::register($field_name, $args, $resolve_callback);   

            

        }

    }