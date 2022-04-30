<?php 

    namespace Archive\Galleries;

    class GalleriesGetDescriptionUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_DESCRIPTION_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SECTION_ID);

        }

    }