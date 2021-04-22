<?php 

    namespace Users;

    class UserCheckAccountExistsUtils {

        public static function has_by_email($email) {

            $user = get_user_by_email($email);		

            if ( FALSE === $user ) :

                echo 'false';

                die();

            endif;

            echo 'true';

            die();

        }

    }