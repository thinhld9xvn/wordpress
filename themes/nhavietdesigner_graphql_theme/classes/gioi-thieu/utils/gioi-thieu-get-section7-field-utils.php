<?php 

    namespace GioiThieuPage;

    class GioiThieuGetSection7Field {

        public static function get() {

           $section7 = \get_field(GIOITHIEU_FIELDS::SECTION7_FIELD, GIOITHIEU_PID);

           return [
               'title' => $section7[GIOITHIEU_FIELDS::SECTION_TITLE_LEFT_FIELD],   
               'logo_partners' => $section7[GIOITHIEU_FIELDS::SECTION_LOGO_PARTNER_FIELD]       
           ];

        }

    }