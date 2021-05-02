<?php 

    namespace Users;

    class UserCheckActiveUtils {

        public static function has($uid) {   
            
            global $current_user;

            return (int) $uid === (int) $current_user->ID;

        }

    }