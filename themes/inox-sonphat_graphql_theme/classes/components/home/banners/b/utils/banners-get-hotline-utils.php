<?php 
    namespace Home\Banners;
    use Theme_Options\HOME_FIELDS;
    class BannersGetHotlineUtils {
        public static function get($p = 0, $lang = DEFAULT_LANG) {
            $field = HOME_FIELDS::HOME_SECTION_BANNER_1_HOTLINE_ID;
            if ($p === 0 && $lang !== DEFAULT_LANG) :
                $field = HOME_FIELDS::HOME_SECTION_BANNER_1_HOTLINE_EN_ID;
            endif;
            if ($p === 1) :
                $field = $lang === DEFAULT_LANG ? HOME_FIELDS::HOME_SECTION_BANNER_2_HOTLINE_ID : 
                                                    HOME_FIELDS::HOME_SECTION_BANNER_2_HOTLINE_EN_ID;
            endif;
            return \Theme_Options\Theme_Options::get_field( $field,
                                                            HOME_FIELDS::HOME_SECTION_ID);
        }
    }