<?php 

    namespace Home\Sections;

    class GalleriesSectionGetHeadingTextUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::HOME_GALLERIES_SECTION_TITLE_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SECTION_ID);

        }

    }