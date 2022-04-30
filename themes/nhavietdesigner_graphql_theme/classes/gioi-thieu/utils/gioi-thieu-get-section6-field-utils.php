<?php 

    namespace GioiThieuPage;

    class GioiThieuGetSection6Field {

        public static function get() {

           $section6 = \get_field(GIOITHIEU_FIELDS::SECTION6_FIELD, GIOITHIEU_PID);

           return [
               'image' => $section6,          
           ];

        }

    }