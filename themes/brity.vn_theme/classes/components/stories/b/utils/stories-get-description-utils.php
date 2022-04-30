<?php

    namespace Stories;

    class StoriesGetDescriptionUtils {

        public static function get() {

            return \Theme_Options\Theme_Options::get_field( \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_DESCRIPTION_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::STORIES_SECTION_ID);

        }

    }