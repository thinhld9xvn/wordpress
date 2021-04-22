<?php 

    namespace Stores;

    class StoreGetMetaDescriptionUtils {

        public static function get($uid) {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_DESCRIPTION_FIELD, true);

        }

    }