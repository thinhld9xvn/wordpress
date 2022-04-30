<?php 
    namespace Membership;
    class RemoveUserRatingMeta {
        public static function remove($uid) {
            return delete_user_meta($uid, USER_META_KEYS::PRODUCTS_RATINGS);
        }
        public static function remove_current() {
            $current_user = wp_get_current_user();
            return delete_user_meta($current_user->ID, USER_META_KEYS::PRODUCTS_RATINGS);
        }
    }