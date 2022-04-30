<?php 

    namespace Home\Sections;

    class SVGetMetaHeadingFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, SV_FIELDS::HEADING_META_FIELD, true);

        }

    }