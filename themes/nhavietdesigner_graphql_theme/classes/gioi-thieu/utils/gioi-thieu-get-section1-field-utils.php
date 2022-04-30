<?php 

    namespace GioiThieuPage;

    class GioiThieuGetSection1Field {

        public static function get() {

            $section1 = \get_field(GIOITHIEU_FIELDS::SECTION1_FIELD, GIOITHIEU_PID);

            return [
                'title' => $section1[GIOITHIEU_FIELDS::SECTION_TITLE_LEFT_FIELD],
                'description' => $section1[GIOITHIEU_FIELDS::SECTION_DESCRIPTION_RIGHT_FIELD]
            ];

        }

    }