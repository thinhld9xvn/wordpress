<?php 

    namespace Home\Sections;

    class GTSectionGetDescriptionHtmlUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_DESCRIPTION_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SECTION_ID);

        }

    }