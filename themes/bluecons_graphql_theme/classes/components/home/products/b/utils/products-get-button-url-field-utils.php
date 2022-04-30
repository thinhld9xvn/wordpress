<?php 
    namespace Home\Products;
    use Theme_Options\HOME_FIELDS;
    class PDGetButtonUrlFieldUtils {
        public static function get() {
            $page_id = \Theme_Options\Theme_Options::get_field( HOME_FIELDS::HOME_SECTION_SP_PAGE_ID_ID,
                                                                HOME_FIELDS::HOME_SECTION_ID);
            return filter_permalink(get_the_permalink(get_post($page_id)));
        }
    }
