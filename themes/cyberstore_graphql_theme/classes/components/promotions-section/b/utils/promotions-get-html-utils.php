<?php 

    namespace PromotionsSection;

    class PromotionsGetHtmlUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_HTML_ID,
                                                                \Theme_Options\THEME_OPTIONS_FIELDS::PROMOTION_SECTION_ID);

        }

    }