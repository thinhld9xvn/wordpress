<?php 
    namespace CTInfo;
    use Theme_Options\BANNERS_FIELDS;
    use \Theme_Options\Theme_Options;
    class CTInfoGetDefaultBannerPageUtils {
        public static function get() {
            return Theme_Options::get_field(BANNERS_FIELDS::BANNERS_SECTION_BG_IMAGE_ID,
                                                    BANNERS_FIELDS::BANNERS_SECTION_ID );
        }
    }