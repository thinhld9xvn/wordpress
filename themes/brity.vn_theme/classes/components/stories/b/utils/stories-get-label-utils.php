<?php

    namespace Stories;

    class StoriesGetLabelUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_LABEL_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_ID);

        }

    }