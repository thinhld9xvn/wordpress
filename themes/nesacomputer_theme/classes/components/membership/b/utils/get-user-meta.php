<?php 
    namespace Membership;
    class GetUserMeta {
        public static function get($uid) {
            $user = get_userdata($uid);
            $email = $user->user_email;
            $full_name = get_user_meta( $uid, USER_META_KEYS::FULL_NAME, true );            
            $phone = get_user_meta( $uid, USER_META_KEYS::PHONE, true );
            $cmnd = get_user_meta( $uid, USER_META_KEYS::PASSPORTS, true );
            return [$full_name, $email, $phone, $cmnd];
        }
    }