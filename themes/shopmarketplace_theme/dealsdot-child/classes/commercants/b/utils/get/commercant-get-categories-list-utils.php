<?php 

    namespace Commercants;

    class CommercantGetStoreCategoriesListUtils {

        public static function get_all() {

            $commercants_list = CommercantGetListUtils::get();

            $arrLists = array();
    
            foreach ( $commercants_list as $key => $shop ) :
    
                $secteur = mb_strtolower( trim( $shop[\DataTables\DT_COMMERCANTS_COLUMNS::SECTEUR_ACTIVITY] ), 'UTF-8' );
    
                if ( false === array_search($secteur, $arrLists) ) :
    
                    $arrLists[] = $secteur;
    
                endif;
    
            endforeach;
    
            // sort alphabetics
            usort($arrLists, function($c1, $c2) {
    
                $coll = collator_create(COLLATOR);		
    
                return collator_compare( $coll, $c1, $c2 );		
    
            });

            if ( ! empty( $arrLists ) ) :

                array_unshift($arrLists, SHOW_ALL_FRANCE_LABEL);

            endif;
    
    
            //echo "<pre>"; print_r($arrLists);
    
            return $arrLists;

        }

        public static function get_by_store($shop_name) {	

            //set_map_categories_with_shop();
    
            $categories_list = self::get_by_map_lists();
    
            //echo "<pre>"; print_r( $categories_list );
    
            $arrLists = array();
    
            $_shop_name = CommercantGetShopNameUtils::get_by_format($shop_name, 'lowercase');
    
            foreach ( $categories_list as $key => $categories ) :	
                
                $_key = CommercantGetShopNameUtils::get_by_format($key, 'lowercase');
    
                if ( $_key === $_shop_name ) :
    
                    $arrLists = $categories; 
    
                    break;
    
                endif;
    
            endforeach;
    
            // sort alphabetics
            usort($arrLists, function($c1, $c2) {
    
                return strcmp($c1['name'], $c2['name']);
    
            });
    
            //echo "<pre>"; print_r( $arrLists );
    
            return $arrLists;
    
        }

        public static function get_by_map_lists() {

            $shop_lists_map = get_option(__COM_SHOP_MAP_CATEGORIES);
            $shop_lists_map = is_null( $shop_lists_map ) || empty( $shop_lists_map ) ? array() : json_decode( $shop_lists_map, true );		
    
            return $shop_lists_map;
    
        }

    }