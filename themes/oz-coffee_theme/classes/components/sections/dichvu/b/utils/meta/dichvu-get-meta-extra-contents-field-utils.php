<?php 

    namespace Home\Sections;

    class SVGetMetaExtraContentsFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, SV_FIELDS::EXTRA_CONTENTS_META_FIELD, true);

        }

    }