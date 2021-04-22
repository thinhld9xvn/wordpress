<?php 

    namespace Stores;

    class StoreGetMetaSpecialScheduleUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_SPECIAL_SCHEDULE_FIELD, true);

        }

    }