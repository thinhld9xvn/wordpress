<?php 
    namespace Membership;
    class CheckRoleAdminUser {
        public static function get($uid) {
            $user = get_userdata($uid);
            return in_array('administrator', $user->roles);
        }
        public static function get_current() {
            $user = wp_get_current_user();
            return in_array('administrator', $user->roles);
        }
    }