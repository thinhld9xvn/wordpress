<?php 
    namespace Home\Knowledges;
    use Theme_Options\HOME_FIELDS;
    class KLGetHeadingFieldUtils {
        public static function get() {
            return \Theme_Options\Theme_Options::get_field( HOME_FIELDS::HOME_SECTION_KT_TITLE_ID,
                                                                HOME_FIELDS::HOME_SECTION_ID);
        }
    }
