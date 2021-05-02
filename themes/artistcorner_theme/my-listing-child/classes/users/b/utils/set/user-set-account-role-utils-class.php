<?php 

    namespace Users;

    class UserSetAccountRoleUtils {

        public static function set($uid, $role_name) {

            update_usermeta($uid, _FIELD_USER_ACCOUNT_ROLE, $role_name);

        }

        public static function set_default($uid) {

            update_usermeta($uid, _FIELD_USER_ACCOUNT_ROLE, _ACCOUNT_ROLE_PROVIDER);

        }

    }