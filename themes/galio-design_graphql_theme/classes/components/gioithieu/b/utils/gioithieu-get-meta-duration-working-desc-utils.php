<?php 

    namespace GioiThieuPage;

    class GioiThieuGetMetaDurationWorkingDescUtils {

        public static function get($pid) {

            return get_post_meta($pid, GIOITHIEU_FIELDS::DURATION_WORKING_DESC_FIELD, true);

        }

    } 
