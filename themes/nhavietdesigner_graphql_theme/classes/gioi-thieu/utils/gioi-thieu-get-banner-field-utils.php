<?php 

    namespace GioiThieuPage;

    class GioiThieuGetBannerField {

        public static function get() {

            return \get_field(GIOITHIEU_FIELDS::BANNER_FIELD, GIOITHIEU_PID);

        }

    }