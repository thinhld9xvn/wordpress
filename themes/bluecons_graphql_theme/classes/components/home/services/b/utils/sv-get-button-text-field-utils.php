<?php 
    namespace Home\Services;
    use Theme_Options\HOME_FIELDS;
    class SVGetButtonTextFieldUtils {
        public static function get() {
            return \Theme_Options\Theme_Options::get_field( HOME_FIELDS::HOME_SECTION_SV_BUTTON_TEXT_ID,
                                                                HOME_FIELDS::HOME_SECTION_ID);
        }
    }
