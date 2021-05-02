<?php

    namespace Urls;

    class UrlGetAgoraVideoCallUtils {

        public static function get() {

            $def_settings = AgoraVideoCall::get_def_settings();  
        
            //print_r($def_settings);

            return get_the_permalink($def_settings['page_id']);
            
        }

    }



