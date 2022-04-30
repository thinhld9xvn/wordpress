<?php 

    namespace GioiThieuPage;

    class GioiThieuGetMetaPriceButtonTextUtils {

        public static function get($pid) {

            return get_post_meta($pid, GIOITHIEU_FIELDS::PRICE_BUTTON_TEXT_FIELD, true);

        }

    } 
