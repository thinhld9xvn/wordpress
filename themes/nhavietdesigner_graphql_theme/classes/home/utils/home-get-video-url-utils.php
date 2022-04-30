<?php 
    namespace Home;

    class HomeGetVideoUrlUtils {

        public static function get() {

            return \get_field(HOME_FIELDS::VIDEO_URL_FIELD, HOME_PID);

        }

    }