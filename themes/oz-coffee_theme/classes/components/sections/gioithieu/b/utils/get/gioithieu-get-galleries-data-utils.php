<?php 

    namespace Home\Sections;

    class GTSectionGetGalleriesDataUtils {

        public static function get() {

            $gallery1 = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY1_ID,
                                                                 \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SECTION_ID);

            $gallery2 = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY2_ID,
                                                                 \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SECTION_ID);

            $gallery3 = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY3_ID,
                                                                 \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SECTION_ID);

            $gallery4 = \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::HOME_INTRO_SECTION_GALLERY4_ID,
                                                                 \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SECTION_ID);                                                                 

            return array(
                $gallery1,
                $gallery2,
                $gallery3,
                $gallery4
            );

        }

    }