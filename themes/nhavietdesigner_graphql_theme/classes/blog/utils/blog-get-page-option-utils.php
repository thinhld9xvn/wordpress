<?php 

    namespace Blog;

    class BlogGetPageOptionUtils {   

        public static function get($pid) {

            return [
                'title' => BlogGetMetaTitleUtils::get($pid),
                'heading' => BlogGetMetaHeadingUtils::get($pid),
                'banner' => BlogGetMetaBannerUtils::get($pid)
            ];

        }

    }