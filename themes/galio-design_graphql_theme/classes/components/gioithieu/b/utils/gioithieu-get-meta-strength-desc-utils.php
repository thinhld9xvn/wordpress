<?php 

    namespace GioiThieuPage;

    class GioiThieuGetMetaStrengthDescUtils {

        public static function get($pid) {

            return get_post_meta($pid, GIOITHIEU_FIELDS::STRENGTH_DESC_FIELD, true);

        }

    } 
