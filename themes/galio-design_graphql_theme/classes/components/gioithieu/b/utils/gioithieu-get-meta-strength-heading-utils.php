<?php 

    namespace GioiThieuPage;

    class GioiThieuGetMetaStrengthHeadingUtils {

        public static function get($pid) {

            return get_post_meta($pid, GIOITHIEU_FIELDS::STRENGTH_HEADING_FIELD, true);

        }

    } 
