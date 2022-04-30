<?php 
    namespace Ratingstars;
    use Membership\GetUserRatingMeta;
    class CheckUserRatingOnProduct {
        public static function perform($uid, $pid) {
            $rating = GetUserRatingMeta::get_by_product($uid, $pid);
            return $rating !== 0;
        }
    }