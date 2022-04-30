<?php 

    namespace NhaMayPage;

    class NhaMayGetTitleField {

        public static function get() {

            return get_post(NHAMAY_PID)->post_title;

        }

    }