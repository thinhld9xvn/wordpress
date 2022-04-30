<?php 

    namespace GioiThieuPage;

    class GioiThieuGetSection3Field {

        public static function get() {

           $section3 = \get_field(GIOITHIEU_FIELDS::SECTION3_FIELD, GIOITHIEU_PID);

           return [
            'title' => $section3[GIOITHIEU_FIELDS::SECTION_TITLE_LEFT_FIELD],
            'description' => $section3[GIOITHIEU_FIELDS::SECTION_DESCRIPTION_RIGHT_FIELD]
        ];

        }

    }