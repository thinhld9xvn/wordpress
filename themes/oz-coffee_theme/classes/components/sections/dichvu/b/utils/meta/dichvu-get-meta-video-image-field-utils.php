<?php 

    namespace Home\Sections;

    class SVGetMetaVideoImageFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, SV_FIELDS::VIDEO_IMAGE_META_FIELD, true);

        }

    }