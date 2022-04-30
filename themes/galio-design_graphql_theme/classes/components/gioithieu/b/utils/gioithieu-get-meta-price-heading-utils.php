<?php 

    namespace GioiThieuPage;

    class GioiThieuGetMetaPriceHeadingUtils {

        public static function get($pid) {

            return get_post_meta($pid, GIOITHIEU_FIELDS::PRICE_HEADING_FIELD, true);

        }

    } 
