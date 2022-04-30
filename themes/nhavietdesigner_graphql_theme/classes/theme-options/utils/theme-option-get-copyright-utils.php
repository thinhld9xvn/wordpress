<?php
    namespace Theme_Options;

    class ThemeOptionGetCopyrightUtils {

        public static function get() {

            return ThemeOptionGetFieldUtils::get(THEME_OPTIONS_FIELDS::TEXT_COPYRIGHT_FIELD);

        }

    }