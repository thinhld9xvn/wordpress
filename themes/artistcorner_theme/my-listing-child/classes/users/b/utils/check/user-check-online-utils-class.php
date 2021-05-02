<?php 

    namespace Users;

    class UserCheckOnlineUtils {

        public static function has($uid) {

            $logged_in_users = get_transient('online_status');

            return isset( $logged_in_users[$uid] );

        }        
        
    }