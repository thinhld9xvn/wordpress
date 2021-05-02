<?php 

    namespace Users;

    class UserGetAccountTypesUtils {

        public static function get($uid) {

            $profile = self::get_user_profile($uid);

            return get_profile_account_types($profile);

        }

        public static function get_types() {

            $args = array(

                'hide_empty' => false,
                'taxonomy' => JOBS_ACCOUNT_TYPE_TAXONOMY

            );

            return get_terms($args);

        }

    }