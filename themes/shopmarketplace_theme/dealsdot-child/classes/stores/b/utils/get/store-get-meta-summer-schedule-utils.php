<?php 

    namespace Stores;

    class StoreGetMetaSummerScheduleUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_SUMMER_SCHEDULE_FIELD, true);

        }

    }