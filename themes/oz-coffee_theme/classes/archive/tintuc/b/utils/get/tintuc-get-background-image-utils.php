<?php 

    namespace Archive\News;

    class NewsGetBackgroundImageUtils {

        public static function get() {           

            return \Theme_Options\Theme_Options::get_field(\Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_TINTUC_BACKGROUND_IMAGE_ID,
                                                            \Theme_Options\THEME_OPTIONS_FIELDS::CUSTOM_PT_SECTION_ID);

        }

    }