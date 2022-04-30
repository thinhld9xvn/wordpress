<?php 

    namespace GioiThieuPage;

    class GioiThieuGetMetaDurationWorkingHeadingUtils {

        public static function get($pid) {

            return get_post_meta($pid, GIOITHIEU_FIELDS::DURATION_WORKING_HEADING_FIELD, true);

        }

    } 
