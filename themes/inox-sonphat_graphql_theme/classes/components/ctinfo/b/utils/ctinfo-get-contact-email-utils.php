<?php 
    namespace CTInfo;
    use \Theme_Options\Theme_Options;
    use \Theme_Options\CTINFO_FIELDS;
    class CTInfoGetContactEmailUtils {
        public static function get() {
            return Theme_Options::get_field(CTINFO_FIELDS::CTINFO_SECTION_EMAIL_ID,
                                                            CTINFO_FIELDS::CTINFO_SECTION_ID );
        }
    }