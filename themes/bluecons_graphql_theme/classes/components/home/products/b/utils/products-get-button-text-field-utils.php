<?php 
    namespace Home\Products;
    use Theme_Options\HOME_FIELDS;
    class PDGetButtonTextFieldUtils {
        public static function get() {
            return \Theme_Options\Theme_Options::get_field( HOME_FIELDS::HOME_SECTION_SP_BUTTON_TEXT_ID,
                                                                HOME_FIELDS::HOME_SECTION_ID);
        }
    }