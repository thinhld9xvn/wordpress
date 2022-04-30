<?php 

    namespace NhaMayPage;

    class NhaMayGetGalleriesField {

        public static function get() {

            return \get_field(NHAMAY_FIELDS::SECTION_GALLERIES_FIELD, NHAMAY_PID);

        }

    }