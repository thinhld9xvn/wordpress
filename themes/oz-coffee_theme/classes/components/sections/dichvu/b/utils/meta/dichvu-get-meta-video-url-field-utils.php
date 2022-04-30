<?php 

    namespace Home\Sections;

    class SVGetMetaVideoUrlFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, SV_FIELDS::VIDEO_URL_META_FIELD, true);

        }

    }