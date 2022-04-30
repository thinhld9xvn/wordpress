<?php 
    namespace Home\Banners;
    use Theme_Options\HOME_FIELDS;
    class BannersGetHotlineUrlUtils {
        public static function get() {
            return \Theme_Options\Theme_Options::get_field( HOME_FIELDS::HOME_SECTION_BANNER_1_HOTLINE_URL_ID,
                                                            HOME_FIELDS::HOME_SECTION_ID);
        }
    }