<?php 

    namespace Users;

    class UserUpdateUtils {

        public static function update($data, $user_id) {

            UserUpdateMetaUtils::update($data, $user_id);

            return true;

        }

    }