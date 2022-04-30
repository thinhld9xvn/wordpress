<?php 

    namespace Delivery;

    class DeliveryGetBox3Utils {

        public static function get() {

            $heading = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_HEADING_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_ID);

            $image = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_IMAGE_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_ID);

            $subheading = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_SUBHEADING_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_ID);

            $subheading_url = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX3_SUBHEADING_URL_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_ID);

            return [
                'id' => 'box3',
                'text' => $heading,
                'image' => $image,
                'sub_text' => [
                    'heading' => $subheading,
                    'url' => $subheading_url
                ]
            ];
            
        }

    }