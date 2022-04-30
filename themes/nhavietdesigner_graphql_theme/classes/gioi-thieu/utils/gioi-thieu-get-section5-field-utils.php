<?php 

    namespace GioiThieuPage;

    class GioiThieuGetSection5Field {

        public static function get() {

           $section5 = \get_field(GIOITHIEU_FIELDS::SECTION5_FIELD, GIOITHIEU_PID);

           return [
               'title' => $section5[GIOITHIEU_FIELDS::SECTION_TITLE_LEFT_FIELD],
               'description' => $section5[GIOITHIEU_FIELDS::SECTION_DESCRIPTION_OPENING_FIELD],
               'description_extras' => $section5[GIOITHIEU_FIELDS::SECTION_DESCRIPTION_RIGHT_FIELD],
           ];

        }

    }