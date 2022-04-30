<?php 
    namespace Logo;
    use Theme_Options\HEADER_FIELDS;
    class LogoGetPrimaryUrlUtils {
        public static function get() {
            $results = [];
            $id = pn_get_attachment_id_from_url(\Theme_Options\Theme_Options::get_field( HEADER_FIELDS::HEADER_SECTION_LOGO_IMAGE_ID,
                                                                                            HEADER_FIELDS::HEADER_SECTION_ID));
            $wid = pn_get_attachment_id_from_url(\Theme_Options\Theme_Options::get_field( HEADER_FIELDS::HEADER_SECTION_LOGO_WHITE_IMAGE_ID,
                                                                                            HEADER_FIELDS::HEADER_SECTION_ID));
            $results[][LOGO_FIELDS::LOGO_URL] = wp_get_attachment_image_url($id, 'medium');
            $results[][LOGO_FIELDS::LOGO_URL] = wp_get_attachment_image_url($wid, 'medium');
            return $results;
        }
    }