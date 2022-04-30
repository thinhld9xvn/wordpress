<?php 

    namespace CTInfo;

    class CTInfoGetContactFormUtils {

        public static function get($id, $title) {
            return do_shortcode("[contact-form-7 id=\"{$id}\" title=\"{$title}\"]");
        }

    }