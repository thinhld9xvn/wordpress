<?php 
    namespace Membership;
    class GetUserRatingMeta {
        public static function get($uid) {
            $ratings = get_user_meta($uid, USER_META_KEYS::PRODUCTS_RATINGS, true);
            return !empty($ratings) ? $ratings : false;
        }
        public static function get_current() {
            $current_user = wp_get_current_user();
            $ratings = get_user_meta($current_user->ID, USER_META_KEYS::PRODUCTS_RATINGS, true);
            return !empty($ratings) ? $ratings : false;
        }
        public static function get_by_product($uid, $pid) {
            $meta = self::get($uid);
            if ( !empty($meta) && array_key_exists($pid, $meta) ) :
                return $meta[$pid]['rating'];
            endif;
            return 0;
        }
    }