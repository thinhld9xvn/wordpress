<?php 
    namespace Home\Knowledges;
    use Theme_Options\HOME_FIELDS;
    class KLGetButtonTextFieldUtils {
        public static function get() {
            return \Theme_Options\Theme_Options::get_field( HOME_FIELDS::HOME_SECTION_KT_BUTTON_TEXT_ID,
                                                                HOME_FIELDS::HOME_SECTION_ID);
        }
    }
