<?php 
    namespace CTInfo;
    use Theme_Options\FOOTER_FIELDS;
    use Theme_Options\Theme_Options;
    class CTInfoGetSupporterUtils {
        public static function get() {
            return Theme_Options::get_field(FOOTER_FIELDS::FOOTER_SECTION_SUPPORT_ID, 
                                                FOOTER_FIELDS::FOOTER_SECTION_ID );
        }
    }