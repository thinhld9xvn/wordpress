<?php 

    namespace Agora;

    class AgoraInitializeUtils {

        private static $agora;      

        public static function init() {            

            self::$agora = \AgoraGetInstanceUtils::get();

            //echo var_dump(self::$agora); die();

        }

    }