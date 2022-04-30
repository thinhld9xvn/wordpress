<?php 

    namespace SalesOffSection;

    class SalesOffGetSubHeadingUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_SUBHEADING_ID,
                                                                \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_ID);

        }

    }