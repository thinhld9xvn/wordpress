<?php 
    namespace Home\Banners;
    use Theme_Options\HOME_FIELDS;
    class BannersGetFeaturedImageUtils {
        public static function get($pos = 0) {
            return \Theme_Options\Theme_Options::get_field( $pos === 0 ? HOME_FIELDS::HOME_SECTION_BANNER_1_FEATURED_IMAGE_ID : 
                                                                         HOME_FIELDS::HOME_SECTION_BANNER_2_FEATURED_IMAGE_ID,
                                                            HOME_FIELDS::HOME_SECTION_ID);
        }
    }