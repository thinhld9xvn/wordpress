<?php 
    namespace Home\Testimolates;
    use Theme_Options\HOME_FIELDS;
    class GetTestimolatesHeadingUtils {
    public static function get($lang = DEFAULT_LANG) {
        $field = $lang === DEFAULT_LANG ? HOME_FIELDS::HOME_SECTION_TESTIMOLATES_HEADING_ID : 
                                                HOME_FIELDS::HOME_SECTION_TESTIMOLATES_HEADING_EN_ID;
        return \Theme_Options\Theme_Options::get_field( $field,
                                                        HOME_FIELDS::HOME_SECTION_ID);
    }
}