<?php 

    namespace Commercants;

    class CommercantSearchShopUtils {

        public static function search($commercants_list, $shop_name) {

            $shop_item = null;

            foreach ($commercants_list as $key => $shop) :

                $s1 = CommercantGetShopNameUtils::get_by_format( $shop[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE], 'lowercase' );
                $s2 = CommercantGetShopNameUtils::get_by_format( $shop_name, 'lowercase' );

                if ( $s1 === $s2 ) :

                    $shop_item = $shop;

                endif;
                        
            endforeach;

            return $shop_item;

        }

        public static function search_id($commercants_list, $shop_name) {

            foreach ($commercants_list as $key => $shop) :

                $s1 = CommercantGetShopNameUtils::get_by_format( $shop[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE], 'lowercase' );
                $s2 = CommercantGetShopNameUtils::get_by_format( $shop_name, 'lowercase' );

                if ( $s1 === $s2 ) :

                    return $key;

                endif;
                        
            endforeach;

            return -1;
    
        }

        public static function search_by_id($commercants_list, $id) {           

            foreach ($commercants_list as $key => $shop) :

               if ( $key === $id ) return $key;
                        
            endforeach;

            return null;

        }

    }