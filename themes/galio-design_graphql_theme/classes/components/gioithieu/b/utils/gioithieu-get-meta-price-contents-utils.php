<?php 

    namespace GioiThieuPage;

    class GioiThieuGetMetaPriceContentsUtils {

        public static function get($pid) {

            return get_post_meta($pid, GIOITHIEU_FIELDS::PRICE_CONTENTS_FIELD, true);

        }

    } 
