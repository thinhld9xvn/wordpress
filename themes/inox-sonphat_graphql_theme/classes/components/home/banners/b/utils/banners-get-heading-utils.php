<?php 
    namespace Home\Banners;
    use Theme_Options\HOME_FIELDS;
    class BannersGetHeadingUtils {
        public static function get($id = 0, $p = 0, $lang = DEFAULT_LANG) {
            $field = HOME_FIELDS::HOME_SECTION_BANNER_1_HEADING1_ID;
            if ($p === 0 && $id === 0 && $lang !== DEFAULT_LANG) :
                $field = HOME_FIELDS::HOME_SECTION_BANNER_1_HEADING1_EN_ID;
            endif;
            if ($p === 1 && $id === 0) :
                $field = $lang === DEFAULT_LANG ? HOME_FIELDS::HOME_SECTION_BANNER_2_HEADING1_ID : 
                                                        HOME_FIELDS::HOME_SECTION_BANNER_2_HEADING1_EN_ID;
            endif;
            if ($p === 0 & $id === 1 ) :
                $field = $lang === DEFAULT_LANG ? HOME_FIELDS::HOME_SECTION_BANNER_1_HEADING2_ID : 
                                                        HOME_FIELDS::HOME_SECTION_BANNER_1_HEADING2_EN_ID;
            endif;
            if ($p === 1 && $id === 1) :
                $field = $lang === DEFAULT_LANG ? HOME_FIELDS::HOME_SECTION_BANNER_2_HEADING2_ID : 
                                                        HOME_FIELDS::HOME_SECTION_BANNER_2_HEADING2_EN_ID;
            endif;
            return \Theme_Options\Theme_Options::get_field( $field,
                                                            HOME_FIELDS::HOME_SECTION_ID);
        }
    }