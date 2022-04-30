<?php 
    namespace Home\Banners;
    use Theme_Options\HOME_FIELDS;
    class BannersGetBackgroundUtils {
        public static function get($pos = 0) {
            $background = \Theme_Options\Theme_Options::get_field( $pos === 0 ? HOME_FIELDS::HOME_SECTION_BANNER_1_BACKGROUND_ID : 
                                                                                HOME_FIELDS::HOME_SECTION_BANNER_2_BACKGROUND_ID,
                                                                        HOME_FIELDS::HOME_SECTION_ID);
            //$att_id = pn_get_attachment_id_from_url($background);
            //return wp_get_attachment_image_url($att_id, 'full');
            return $background;
        }
    }