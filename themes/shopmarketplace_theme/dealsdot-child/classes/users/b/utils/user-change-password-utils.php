<?php 

    namespace Users;

    class UserChangePasswordUtils {

        public static function change($new_password, $uid) {           

            wp_update_user(array(

                USER_DATA_FIELDS::ID => $uid,
                USER_DATA_FIELDS::USER_PASS => $new_password

           )); 

           //wp_cache_delete($user_id, 'users');            

        }

    }