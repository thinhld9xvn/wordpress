<?php 
    namespace Logo;
    use Theme_Options\HEADER_FIELDS;
    class LogoGetPrimaryUrlUtils {
        public static function get() {
            $id = pn_get_attachment_id_from_url(\Theme_Options\Theme_Options::get_field( HEADER_FIELDS::HEADER_SECTION_LOGO_IMAGE_ID,
                                                                HEADER_FIELDS::HEADER_SECTION_ID));
            return wp_get_attachment_image_url($id, 'medium');   
        }
    }