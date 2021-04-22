<?php 

    namespace Commercants;

    class CommercantGetCoordsOptionUtils {

        public static function get() {

            $commercants_coords = get_option(_COM_COORDS_OPTION_NAME);

            $commercants_coords = is_null( $commercants_coords ) || FALSE === $commercants_coords ? '' : $commercants_coords; 
    
            return $commercants_coords;

        }

    }