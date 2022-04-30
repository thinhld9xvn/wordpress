<?php 

    namespace Archive\UuDai;

    class UDGetBackgroundImageUtils  {

        public static function get() {

            $url = \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_UUDAI_BACKGROUND_IMAGE_ID,
                                                                  \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SECTION_ID);

            $attachment_id = pn_get_attachment_id_from_url($url);

            return wp_get_attachment_image_url($attachment_id, 'feature-image-service-banner');            

        }

    }