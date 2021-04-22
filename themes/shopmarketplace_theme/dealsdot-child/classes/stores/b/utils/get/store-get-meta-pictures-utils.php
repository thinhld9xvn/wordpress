<?php 

    namespace Stores;

    class StoreGetMetaPicturesUtils {

        public static function get() {

            return get_user_meta($uid, \Stores\STORE_FIELDS::STORE_PICTURES_FIELD, true);

        }

    }