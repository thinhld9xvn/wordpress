<?php 

    namespace Stores;

    class StoreGetMetaGeolocationUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_GEOLOCATION_FIELD, true);

        }

    }