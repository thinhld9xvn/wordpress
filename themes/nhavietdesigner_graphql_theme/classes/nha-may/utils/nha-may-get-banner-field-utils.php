<?php 

    namespace NhaMayPage;

    class NhaMayGetBannerField {

        public static function get() {

            return \get_field(NHAMAY_FIELDS::BANNER_FIELD, NHAMAY_PID);

        }

    }