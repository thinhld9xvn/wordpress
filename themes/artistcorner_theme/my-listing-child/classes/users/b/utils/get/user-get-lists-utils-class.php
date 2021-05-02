<?php 

    namespace Users;

    class UserGetListsUtils {

        public static function get() {           

            global $current_user;

            return get_users(array(
                'exclude' => $current_user->ID
            ));

        }

    }