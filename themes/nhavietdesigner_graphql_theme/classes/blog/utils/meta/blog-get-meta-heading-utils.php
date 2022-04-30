<?php 

    namespace Blog;

    class BlogGetMetaHeadingUtils {

        public static function get($pid) {

            return \get_field(BLOG_FIELDS::HEADING_BANNER_FIELD, $pid);

        }
        
    }