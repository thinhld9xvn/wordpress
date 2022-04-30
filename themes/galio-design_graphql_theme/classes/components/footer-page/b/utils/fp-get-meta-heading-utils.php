<?php 

    namespace FooterPage;

    use \Theme_Options\FOOTER_FIELDS;
    use \Theme_Options\Theme_Options;

    class FPGetMetaHeadingUtils {

        public static function get($lang = DEFAULT_LANG) {
            $field = $lang === DEFAULT_LANG ? FOOTER_FIELDS::FOOTER_PAGE_SECTION_HEADING_CT_ID :
                                                    FOOTER_FIELDS::FOOTER_PAGE_SECTION_HEADING_CT_EN_ID;
            return Theme_Options::get_field( $field, FOOTER_FIELDS::FOOTER_PAGE_SECTION_ID );
        }

    }