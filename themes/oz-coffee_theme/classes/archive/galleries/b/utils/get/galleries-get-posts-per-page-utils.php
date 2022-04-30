<?php 

    namespace Archive\Galleries;

    class GalleriesGetPostsPerPageUtils {

        public static function get() {

            $post_type = GalleriesGetPostTypeUtils::get();

            return (int) \Theme_Options\Theme_Options::get_field("global-pagenumber-post-type-{$post_type}",
                                                                     \Theme_Options\THEME_OPTIONS_FIELDS::GLOBAL_SECTION_ID);

        }

    }