<?php 

    namespace FooterPage;

    use \Theme_Options\FOOTER_FIELDS;
    use \Theme_Options\Theme_Options;

    class FPGetMetaButtonUrlUtils {

        public static function get($lang = DEFAULT_LANG) {
            $page_id = Theme_Options::get_field( FOOTER_FIELDS::FOOTER_PAGE_SECTION_BUTTON_PAGE_ID_ID, 
                                                        FOOTER_FIELDS::FOOTER_PAGE_SECTION_ID );
            $page = pll_get_post($page_id, $lang);
            return filter_permalink(get_the_permalink($page));
        }

    }