<?php 

    namespace Home\Sections;

    class SVGetMetaShortContentsFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, SV_FIELDS::SHORT_CONTENTS_META_FIELD, true);

        }

    }