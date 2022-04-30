<?php 

    namespace GioiThieuPage;

    class GioiThieuGetSection4Field {

        public static function get() {

           $section4 = \get_field(GIOITHIEU_FIELDS::SECTION4_FIELD, GIOITHIEU_PID);

           return [
               'image' => $section4['url']
           ];

        }

    }