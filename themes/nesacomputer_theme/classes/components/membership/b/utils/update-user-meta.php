<?php 
    namespace Membership;
    class UpdateUserMeta {
        public static function update($params) {
            extract($params);
            update_user_meta( $uid, USER_META_KEYS::FULL_NAME, $fullname );            
            update_user_meta( $uid, USER_META_KEYS::PHONE, $phone );
            update_user_meta( $uid, USER_META_KEYS::PASSPORTS, $cmnd );
            return true;
        }
    }