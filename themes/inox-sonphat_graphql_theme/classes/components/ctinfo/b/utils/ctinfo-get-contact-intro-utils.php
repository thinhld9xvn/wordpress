<?php 
    namespace CTInfo;
    use \Theme_Options\Theme_Options;
    use \Theme_Options\CTINFO_FIELDS;
    class CTInfoGetContactIntroUtils {
        public static function get($lang = DEFAULT_LANG) {
            $field = $lang === DEFAULT_LANG ? CTINFO_FIELDS::CTINFO_SECTION_INTRO_ID : 
                                                CTINFO_FIELDS::CTINFO_SECTION_INTRO_EN_ID;
            return Theme_Options::get_field($field, CTINFO_FIELDS::CTINFO_SECTION_ID );
        }
    }