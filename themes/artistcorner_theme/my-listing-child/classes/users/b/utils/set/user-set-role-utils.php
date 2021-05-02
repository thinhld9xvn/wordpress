<?php 

    namespace Users;

    class UserSetRoleUtils {

        public static function set($uid, $role_name) {

            // Fetch the WP_User object of our user.
            $u = new WP_User( $uid );

            // Replace the current role with 'editor' role
            $u->set_role( $role_name );

        }

    }