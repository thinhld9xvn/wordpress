<?php 

    namespace CTInfo;

    class CTInfoGetContactEmailUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_CONTACT_EMAIL_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::CTINFO_SECTION_ID);

        }

    }