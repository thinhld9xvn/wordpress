<?php 

    namespace YoastSeo;

    class YoastSeoGetPageSeoUtils {

        public static function get($post)  {

          return YoastSeoGetObjectSeoUtils::get($post, 'page');

        }

    }