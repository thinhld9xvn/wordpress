<?php

    namespace Theme_Options;

    class Theme_Options {

        public static function get_section($section_id) {

            $options = get_option($section_id. '_option_name');

            return $options;

        }

        public static function get_field($field_id, $section_id) {

            $options = get_option($section_id. '_option_name');

            return $options[$field_id . '-id'];

        }

    }