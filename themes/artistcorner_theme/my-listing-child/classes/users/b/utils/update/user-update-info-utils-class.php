<?php 

    namespace Users;

    class UserUpdateInfoUtils {

        public static function update($data) {

            wp_update_user($data);
            
        }

    }