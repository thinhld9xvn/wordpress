<?php 

    namespace Delivery;

    class DeliveryGetBox2Utils {

        public static function get() {

            $heading = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_HEADING_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_ID);

            $image = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_IMAGE_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_ID);

            $subheading = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_BOX2_SUBHEADING_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::DELIVERY_SECTION_ID);

            return [
                'id' => 'box2',
                'text' => $heading,
                'image' => $image,
                'sub_text' => [
                    'text' => $subheading
                ]
            ];
            
        }

    }