<?php 

    namespace Stores;

    class StoreGetMetaWinterOpeningDayUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_WINTER_OPENING_DAY_FIELD, true);

        }

    }