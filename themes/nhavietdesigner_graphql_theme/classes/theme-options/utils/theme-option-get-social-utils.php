<?php
    namespace Theme_Options;

    class ThemeOptionGetSocialUtils {

        public static function get() {

            return ThemeOptionGetFieldUtils::get(THEME_OPTIONS_FIELDS::SOCIAL_FIELD);

        }

    }