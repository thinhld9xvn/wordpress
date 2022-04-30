<?php 
    namespace Membership;
    class UpdateUserRatingMeta {
        public static function update($uid, $rating, $product_id) {
            $mydata = [                
                'product_id' => $product_id,
                'rating' => $rating
            ];
            $data = get_user_meta($uid, USER_META_KEYS::PRODUCTS_RATINGS, true);
            if ( empty($data) ) :
                $data = [];
            endif;
            if ( !array_key_exists($product_id, $data) ) :
                $data[$product_id] = $mydata;
                update_user_meta($uid, USER_META_KEYS::PRODUCTS_RATINGS, $data);
            endif;            
        }
    }