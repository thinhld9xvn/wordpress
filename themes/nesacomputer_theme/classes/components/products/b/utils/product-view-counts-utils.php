<?php 
    namespace Products;
    class ProductViewCountsUtils {
        public static function get_count($id) {
            return (int) get_post_meta( $id, 'post_views_count', true );
        }
        public static function inc_count($id) {
            $key = 'post_views_count';
            $count = (int) get_post_meta( $id, $key, true );
            $count++;	  
            update_post_meta( $id, $key, $count );
        }
    }   
