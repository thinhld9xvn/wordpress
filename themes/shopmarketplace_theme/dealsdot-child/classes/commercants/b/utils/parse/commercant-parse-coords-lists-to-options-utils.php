<?php 

    namespace Commercants;

    class CommercantParseCoordsListsToOptionsUtils {

        public static function parse($coords_lists) {

            $coords_data = '';

             if ( count( $coords_lists ) > 0 ) :

                foreach ( $coords_lists as $key => $coords ) :

                    $lat = \Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LAT;
                    $lng = \Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LNG;
                    $delimiter = \Stores\STORE_DATA::STORE_DELIMITER;

                    $coords_data .= "lat: {$coords[$lat]}" . PHP_EOL;
                    $coords_data .= "long: {$coords[$lng]}" . PHP_EOL;
                    $coords_data .= $delimiter . PHP_EOL;

                endforeach;
                
             endif;

             return $coords_data;

        }

    }