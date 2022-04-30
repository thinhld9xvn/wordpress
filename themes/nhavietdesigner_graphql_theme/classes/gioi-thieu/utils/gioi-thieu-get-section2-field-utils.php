<?php 

    namespace GioiThieuPage;

    class GioiThieuGetSection2Field {

        public static function get() {

           return \get_field(GIOITHIEU_FIELDS::SECTION2_FIELD, GIOITHIEU_PID);

        }

    }