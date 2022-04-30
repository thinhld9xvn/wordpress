<?php 

    namespace SalesOffSection;

    class SalesOffGetButtonTextUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BUTTON_TEXT_ID,
                                                                \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_ID);

        }

    }