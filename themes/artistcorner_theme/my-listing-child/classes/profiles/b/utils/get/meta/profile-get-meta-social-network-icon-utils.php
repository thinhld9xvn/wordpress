<?php 
    
    namespace Profiles;

    class ProfileGetMetaSocialNetworkIconUtils {

        public static function get($network) {

            $icon = 'fa fa-';

            $network = trim( mb_strtolower( $network, 'UTF-8' ) );

            return $icon . $network;

        }

    }