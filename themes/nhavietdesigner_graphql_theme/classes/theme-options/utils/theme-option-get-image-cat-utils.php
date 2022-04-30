<?php
    namespace Theme_Options;

    class ThemeOptionGetImageCatUtils {

        public static function get() {

            $banners = ThemeOptionGetFieldUtils::get(THEME_OPTIONS_FIELDS::IMAGE_BANNERS_FIELD); 

            return $banners[THEME_OPTIONS_FIELDS::IMAGE_CAT_FIELD];

        }

    }