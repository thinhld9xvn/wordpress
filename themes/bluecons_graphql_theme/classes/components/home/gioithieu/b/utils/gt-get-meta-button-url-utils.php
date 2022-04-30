<?php 
    namespace Home\GioiThieu;
    use \Theme_Options\HOME_FIELDS;
    use \Theme_Options\Theme_Options;
    class GTGetMetaButtonUrlUtils {
        public static function get() {
            $pageid = Theme_Options::get_field(HOME_FIELDS::HOME_SECTION_GT_PAGE_ID_ID, 
                                                    HOME_FIELDS::HOME_SECTION_ID);
            return filter_permalink(get_the_permalink(get_post($pageid)));
        }
    }
