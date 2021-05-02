<?php 

    namespace Commercants;

    class CommercantEditCoordsOptionUtils {

        public static function edit($data) {

            $commercantsList = \Commercants\CommercantGetListUtils::get();

            $commercantCoordsList = \Commercants\CommercantGetCoordsListUtils::get();

            $shop_name = \Strings\StringFormatUtils::format(trim($data[\DataTables\DT_COMMERCANTS_COLUMNS::ENSEIGNE]), 
                                                                'lowercase');

            $shop_idx = \Commercants\CommercantSearchShopUtils::search_id($commercantsList, $shop_name);

            if ( $shop_idx === -1 ) return false;

            $shop_coords = &$commercantCoordsList[$shop_idx];

            $shop_coords[\Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LAT] = $data[\Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LAT];
            $shop_coords[\Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LNG] = $data[\Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LNG];

            $options = \Commercants\CommercantParseCoordsListsToOptionsUtils::parse($commercantCoordsList);

            \Commercants\CommercantUpdateCoordsOptionUtils::update($options);

            return true;
            
        
        }

    }