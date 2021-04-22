<?php 

    namespace Stores;

    class StoreUpdateMetaTokenUtils {

        public static function update($uid, $token) {

            update_user_meta($uid, \Stores\STORE_FIELDS::STORE_TOKEN_FIELD, $token);

        }

    }