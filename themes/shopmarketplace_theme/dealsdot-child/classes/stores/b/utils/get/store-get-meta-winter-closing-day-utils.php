<?php 

    namespace Stores;

    class StoreGetMetaWinterClosingDayUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_WINTER_CLOSING_DAY_FIELD, true);

        }

    }