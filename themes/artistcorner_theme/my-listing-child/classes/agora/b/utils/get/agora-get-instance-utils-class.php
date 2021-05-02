<?php 

    namespace Agora;

    class AgoraGetInstanceUtils {

        public static function get() {

            global $wp_agora_plugin;           

            return $wp_agora_plugin->plugin_public;
            
        }

    }