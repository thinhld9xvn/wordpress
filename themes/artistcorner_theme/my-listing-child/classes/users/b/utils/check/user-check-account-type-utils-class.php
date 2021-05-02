<?php 

    namespace Users;

    class UserCheckAccountTypeUtils {

        private static $isCoachingAccount = false;

        private static function _parse_coaching_account_type($term_type) {

            if ( str_format($term_type->name, 'lowercase') === ACCOUNT_TYPE_COACHING ) :

                self::$isCoachingAccount = true;

            endif;

        }      

        public static function is_coaching() {

            global $current_user;

            $profile = self::get_user_profile($current_user->ID);

            $account_types = get_profile_account_types($profile);

            self::$isCoachingAccount = false;          

            array_map(array(self, '_parse_coaching_account_type'), $account_types);

            return self::$isCoachingAccount;

        }      

    }