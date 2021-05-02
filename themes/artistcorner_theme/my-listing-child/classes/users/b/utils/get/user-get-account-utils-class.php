<?php 

    namespace Users;

    class UserGetAccountUtils {

        public static function get($username) {

            return get_user_by('login', $username);
    
        }

        public static function get_by_uid($uid) {

            return get_user_by('id', $uid);

        }

    }