<?php 
    namespace Home;

    class HomeGetShopBannerUtils {

        public static function get() {

            return \get_field(HOME_FIELDS::SHOP_BANNER_FIELD, HOME_PID);

        }

    }