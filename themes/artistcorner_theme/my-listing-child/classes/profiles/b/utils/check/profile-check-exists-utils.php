<?php 

    namespace Profiles;

    class ProfileCheckExistsUtils {

        public static function has() {

            self::get_active_user_profile();            

            return self::$active_user_profile;

        }

    }