<?php 

    namespace Home\Sections;

    class SVSectionGetBannerUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_BANNER_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SECTION_ID);

        }

    }