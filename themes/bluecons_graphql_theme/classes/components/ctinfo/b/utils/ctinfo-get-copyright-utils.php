<?php 
    namespace CTInfo;
    use \Theme_Options\Theme_Options;
    use Theme_Options\FOOTER_FIELDS;
    class CTInfoGetCopyrightUtils {
        public static function get() {
            return Theme_Options::get_field(FOOTER_FIELDS::FOOTER_SECTION_COPYRIGHT_ID, 
                                                FOOTER_FIELDS::FOOTER_SECTION_ID );
        }
    }