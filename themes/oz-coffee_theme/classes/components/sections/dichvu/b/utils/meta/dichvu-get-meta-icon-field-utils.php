<?php 

    namespace Home\Sections;

    class SVGetMetaIconFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, SV_FIELDS::ICON_META_FIELD, true);

        }

    }