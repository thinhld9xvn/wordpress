<?php 

    namespace SalesOffSection;

    class SalesOffGetBackgroundUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_BANNER_ID,
                                                                \Theme_Options\THEME_OPTIONS_FIELDS::SALES_OFF_SECTION_ID);

        }

    }