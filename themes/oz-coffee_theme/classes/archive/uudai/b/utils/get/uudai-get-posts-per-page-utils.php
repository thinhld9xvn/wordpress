<?php 

    namespace Archive\UuDai;

    class UDGetPostsPerPageUtils {

        public static function get() {

            $post_type = UD_FIELDS::POST_TYPE;

            return (int) \Theme_Options\Theme_Options::get_field("global-pagenumber-post-type-{$post_type}",
                                                                     \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_SECTION_ID);

        }

    }