<?php 

    namespace Logo;

    class LogoGetFooterUrlUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_LOGO_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_ID);

        }

    }