<?php 

    namespace Blog;

    class BlogGetMetaBannerUtils {

        public static function get($pid) {

            return \get_field(BLOG_FIELDS::BANNER_FIELD, $pid);

        }
        
    }