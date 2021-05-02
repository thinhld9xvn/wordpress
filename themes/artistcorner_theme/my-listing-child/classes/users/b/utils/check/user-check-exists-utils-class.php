<?php 

    namespace Users;

    class UserCheckExistsUtils {

        public static function has($username) {

            return username_exists($username);
    
        }

    }