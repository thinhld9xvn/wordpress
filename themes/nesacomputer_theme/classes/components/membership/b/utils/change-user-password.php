<?php 
    namespace Membership;
    class ChangeUserPassword {
        public static function change($uid, $new_pass) {
            wp_update_user(array(
                'ID' => $uid,
                'user_pass' => $new_pass
           )); 
        }
    }