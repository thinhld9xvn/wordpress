<?php 

    namespace Logo;

    class LogoGetPrimaryUrlUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_LOGO_IMAGE_ID,
            \Theme_Options\THEME_OPTIONS_FIELDS::HEADER_SECTION_ID);

        }

    }