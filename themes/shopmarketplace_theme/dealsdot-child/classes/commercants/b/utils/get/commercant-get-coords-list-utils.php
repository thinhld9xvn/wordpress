<?php 

    namespace Commercants;

    class CommercantGetCoordsListUtils {

        public static function get() {

            $data_coords_list = array();    						

            $commercants_coords = CommercantGetCoordsOptionUtils::get();    						 						

            // coords data

            $coords_data = explode(\Stores\STORE_DATA::STORE_DELIMITER, $commercants_coords); 		

            foreach ( $coords_data as $i => $row ) : 

                //print_r(preg_split("/\R/", $row)); die();

                $pieces = preg_split("/\R/", $row);

                $lat = 0;
                $lng = 0;				

                foreach ( $pieces as $piece ) :

                    if ( ! empty( $piece ) ) :

                        $info = explode(': ', $piece);  

                        if ( $info[0] === 'lat' ) :

                            $lat = $info[1];

                        endif;  

                        if ( $info[0] === 'long' ) :

                            $lng = $info[1];

                        endif; 						

                    endif;

                endforeach; 

                if ( $lat !== 0 && $lng !== 0 ) :

                    $data_coords_list[] = array(

                        \Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LAT => $lat,
                        \Stores\STORE_DATA_FIELDS::STORE_GEOLOCATION_LNG => $lng
                        
                    ); 

                endif;   						

            endforeach;

            return $data_coords_list;

        }

    }