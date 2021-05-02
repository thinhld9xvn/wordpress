<?php 

    namespace Users;

    class UserCheckProfileTermsUtils {

        public static function has_by_slug($terms, $slug) {

            $pieces = explode(',', $slug);   
        
            $pieces = array_map(function($v) {

                return trim( mb_strtolower( $v, 'UTF-8' ) );

            }, $pieces);

            foreach( $terms as $key => $item ) :

                $slug1 = trim( mb_strtolower( $item->slug, 'UTF-8' ) );
                        
                if ( in_array( $slug1, $pieces ) ) return true;

            endforeach;

            return false;

        }

    }