<?php 

    namespace Footer;

    class FooterGetContactPhoneUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_CONTACT_PHONE_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::FOOTER_SECTION_ID);

        }

    }