<?php 

    namespace Footer;

    class FooterGetBackgroundUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_BACKGROUND_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_ID);

        }

    }