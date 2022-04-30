<?php 

    namespace GioiThieuPage;

    class GioiThieuGetMetaHeadingUtils {

        public static function get($pid) {

            return get_post_meta($pid, GIOITHIEU_FIELDS::HEADING_FIELD, true);

        }

    } 
