<?php 

    namespace SalesOffSection;

    class SalesOffGetButtonUrlUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BUTTON_URL_ID,
                                                                \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_ID);

        }

    }