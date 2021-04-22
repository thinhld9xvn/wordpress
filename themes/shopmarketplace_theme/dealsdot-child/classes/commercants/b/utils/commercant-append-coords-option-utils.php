<?php 

    namespace Commercants;

    class CommercantAppendCoordsOptionUtils {

        public static function append($data) {
          
            $options = CommercantGetCoordsOptionUtils::get();    

            $options .= "lat: " . $data[\Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LAT] . PHP_EOL;
            $options .= "long: " . $data[\Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LNG] . PHP_EOL;
            $options .= \Stores\STORE_DATA::STORE_DELIMITER . PHP_EOL;
            
           \Commercants\CommercantUpdateCoordsOptionUtils::update($options);

        }

    }