<?php
    namespace Theme_Options;

    class ThemeOptionGetFieldUtils {

        public static function get($field_name) {

            return \get_field($field_name, 'option');

        }

    }