<?php 

    namespace Home\Sections;

    class SVSectionGetDescriptionHtmlUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SERVICE_SECTION_DESCRIPTION_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SECTION_ID);

        }

    }