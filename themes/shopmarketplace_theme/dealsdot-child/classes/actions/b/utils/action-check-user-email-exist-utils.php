<?php 
    namespace Actions;

    class ActionCheckUserEmailExistUtils {

        public static function perform() {

            $email = $_POST['email'];

            $user = get_user_by_email($email);		

            if ( FALSE === $user ) :

                echo 'false';

                die();

            endif;

            echo 'true';

            die();

        }

    }