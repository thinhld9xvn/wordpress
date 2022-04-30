<?php 

    namespace Blog;

    class BlogGetMetaTitleUtils {

        public static function get($pid) {

            return \get_field(BLOG_FIELDS::TITLE_FIELD, $pid);

        }
        
    }