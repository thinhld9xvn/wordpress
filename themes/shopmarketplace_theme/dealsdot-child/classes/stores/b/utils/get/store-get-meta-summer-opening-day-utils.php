<?php 

    namespace Stores;

    class StoreGetMetaSummerOpeningDayUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_SUMMER_OPENING_DAY_FIELD, true);

        }

    }