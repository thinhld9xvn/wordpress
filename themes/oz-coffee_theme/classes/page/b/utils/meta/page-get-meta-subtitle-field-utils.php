<?php 

    namespace Page;

    class PageGetMetaSubTitleFieldUtils  {

        public static function get($post_id) { 

            return get_post_meta($post_id, PAGE_FIELDS::PAGE_SUBTITLE_FIELD, true);


        }

    }