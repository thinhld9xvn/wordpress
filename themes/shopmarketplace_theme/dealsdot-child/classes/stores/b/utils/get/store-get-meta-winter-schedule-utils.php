<?php 

    namespace Stores;

    class StoreGetMetaWinterScheduleUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_WINTER_SCHEDULE_FIELD, true);

        }

    }