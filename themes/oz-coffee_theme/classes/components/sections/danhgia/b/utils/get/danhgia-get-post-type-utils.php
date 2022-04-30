<?php 

    namespace Home\Sections;

    class ReviewsSectionGetPostTypeUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::HOME_REVIEWS_SECTION_POST_TYPE_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::HOME_SECTION_ID);

        }

    }