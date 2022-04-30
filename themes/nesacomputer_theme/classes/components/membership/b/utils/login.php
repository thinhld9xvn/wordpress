<?php 
    namespace Membership;
    class Login {
        public static function perform($params) {
            extract($params);
            $creds = array(
                'user_login'    => $username,
                'user_password' => $password,
                'remember'      => true
            );
            return !is_wp_error(wp_signon( $creds, false ));
        }
    }