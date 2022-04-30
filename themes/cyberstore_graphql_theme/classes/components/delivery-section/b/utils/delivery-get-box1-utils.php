<?php 

    namespace Delivery;

    class DeliveryGetBox1Utils {

        public static function get() {

            $heading = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HEADING_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_ID);

            $image = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_IMAGE_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_ID);

            $hotline = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HOTLINE_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_ID);

            $hotline_url = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX1_HOTLINE_URL_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_ID);

            return [
                'id' => 'box1',
                'text' => $heading,
                'image' => $image,
                'sub_text' => [
                    'heading' => $hotline,
                    'url' => $hotline_url
                ]
            ];
            
        }

    }