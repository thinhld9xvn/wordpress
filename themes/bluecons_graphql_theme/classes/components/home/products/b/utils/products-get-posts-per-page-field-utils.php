<?php 
    namespace Home\Products;
    use Theme_Options\HOME_FIELDS;
    class PDGetPostsPerPageFieldUtils {
        public static function get() {
            return \Theme_Options\Theme_Options::get_field( HOME_FIELDS::HOME_SECTION_SP_POSTS_PER_PAGE_ID,
                                                                HOME_FIELDS::HOME_SECTION_ID);
        }
    }
