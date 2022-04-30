<?php 
    namespace Home\GioiThieu;
    use \Theme_Options\HOME_FIELDS;
    use \Theme_Options\Theme_Options;
    class GTGetMetaContentsColumnUtils {
        public static function get() {
            return Theme_Options::get_field(HOME_FIELDS::HOME_SECTION_GT_DESCRIPTION_ID, HOME_FIELDS::HOME_SECTION_ID);
        }
    }
