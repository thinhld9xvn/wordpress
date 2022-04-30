<?php 

    namespace GioiThieuPage;

    class GioiThieuGetMetaSliderUtils {

        public static function get($pid) {

            return get_post_meta($pid, GIOITHIEU_FIELDS::SLIDER_FIELD, true);

        }

    } 
