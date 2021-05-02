<?php 

    namespace Users;

    class UserSetPasswordUtils {

        public static function set($new_password, $current_user) {

            wp_update_user(array(
                'ID' => $current_user->ID,
                'user_pass' => $new_password
           ));


        }

    }