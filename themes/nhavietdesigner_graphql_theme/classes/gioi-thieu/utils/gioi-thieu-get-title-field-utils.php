<?php 

    namespace GioiThieuPage;

    class GioiThieuGetTitleField {

        public static function get() {

            return \get_field(GIOITHIEU_FIELDS::TITLE_FIELD, GIOITHIEU_PID);

        }

    }