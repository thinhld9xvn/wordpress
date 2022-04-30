<?php 

    namespace Home\LHTK;
    use \Theme_Options\HOME_FIELDS;
    use \Theme_Options\Theme_Options;

    class LHTKGetMetaButtonUrlUtils {

        public static function get($lang = DEFAULT_LANG) {

            $pageid = Theme_Options::get_field(HOME_FIELDS::HOME_SECTION_LHTK_BUTTON_PAGE_ID, 
                                                                    HOME_FIELDS::HOME_SECTION_ID);

            $page = pll_get_post($pageid, $lang);

            return filter_permalink(get_the_permalink($page));

        }

    }
