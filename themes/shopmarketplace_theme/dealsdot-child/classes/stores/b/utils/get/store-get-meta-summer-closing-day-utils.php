<?php 

    namespace Stores;

    class StoreGetMetaSummerClosingDayUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_SUMMER_CLOSING_DAY_FIELD, true);

        }

    }