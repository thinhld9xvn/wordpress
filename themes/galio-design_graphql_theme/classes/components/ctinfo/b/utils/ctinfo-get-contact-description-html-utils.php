<?php 

    namespace CTInfo;
    use \Theme_Options\CTINFO_FIELDS;
    use \Theme_Options\Theme_Options;

    class CTInfoGetContactDescriptionHtmlUtils {

        public static function get($lang = DEFAULT_LANG) {

            $field = $lang === DEFAULT_LANG ? CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION_ID :
                                                    CTINFO_FIELDS::CTINFO_SECTION_DESCRIPTION_EN_ID;

            return Theme_Options::get_field( $field,
                                                CTINFO_FIELDS::CTINFO_SECTION_ID );

        }

    }