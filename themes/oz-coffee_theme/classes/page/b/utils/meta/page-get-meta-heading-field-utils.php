<?php 

    namespace Page;

    class PageGetMetaHeadingFieldUtils  {

        public static function get($post_id) { 

            return get_post_meta($post_id, PAGE_FIELDS::PAGE_HEADING_FIELD, true);


        }

    }