<?php

    namespace Users;

    class UserGetAccountRoleUtils {

        public static function get($uid) {

            return get_usermeta($uid, _FIELD_USER_ACCOUNT_ROLE);

        }

    }