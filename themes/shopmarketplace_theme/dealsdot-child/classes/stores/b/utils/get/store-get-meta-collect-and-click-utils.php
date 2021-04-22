<?php 

    namespace Stores;

    class StoreGetMetaCollectAndClickUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_CLICK_AND_COLLECT_FIELD, true);

        }

    }