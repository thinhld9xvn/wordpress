<?php 

    namespace Archive\Galleries;

    class GalleriesGetBackgroundImageUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_GALLERIES_BACKGROUND_IMAGE_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SECTION_ID);

        }

    }