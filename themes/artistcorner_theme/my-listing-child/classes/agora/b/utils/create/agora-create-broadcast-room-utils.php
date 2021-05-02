<?php 

    namespace Agora;

    class AgoraCreateBroadCastRoomUtils {

        public static function create($uids) {
            // Shortcode [agora-broadcast]          

            $agora = \AgoraGetInstanceUtils::get();
            $def_settings = \AgoraGetSettingsUtils::get();

            extract($def_settings);

            // Avoid duplicated shortcode rendered
            if (WP_Agora_Public::isShortcodeRendered('[agora-broadcast]')) {
                return "<!-- Shortcode Already Rendered: ".print_r($agora, true)." -->";
            }
        
            //$instance = $agora->getShortcodeAttrs('agora-broadcast', $attrs);
        
            /*if (($err = $agora->validateShortcode($instance))!==false) {
                return $err;
            }*/

            $instance = array(

                'channel_id' => $channel_id,
                'audio' => true,
                'video' => true,
                'screen' => false,
                'videoprofile' => $video_profile,
                'screenprofile' => $screen_profile

            );
        
            $agora->enqueueShortcodeStyles('broadcast');
        
            $channel = WP_Agora_Channel::get_instance($channel_id);

            if ($channel) :

                $props = $channel->get_properties();
                $current_user = wp_get_current_user();

                $props['host'] = $uids;

                //echo "<pre>"; print_r($props);
        
                ob_start();
                //echo var_dump($props['host']);
                // @host: user id who owner channel
                $host = is_array($props['host']) ? $props['host'] : array($props['host']);
                //$host = $uids;

                if ( in_array($current_user->ID, $host) ) :

                    $agoraUserScript = '/public/js/agora-broadcast-client.js';
                    require_once(AGORA_PLUGIN_DIR_PATH . '/public/views/wp-agora-io-broadcast.php');

                else :

                    //$agoraUserScript = '/public/js/agora-audience-client.js';
                    //wp_die('you cannot access this');
                    //require_once(AGORA_PLUGIN_DIR_PATH . '/public/views/wp-agora-io-audience.php');

                    return null;

                endif;

                $out = ob_get_clean();
        
                //echo $out; die();
            
                //wp_die();
        
                if (isset($agoraUserScript) && $agoraUserScript!=='') :

                    wp_enqueue_script(
                    'AgoraBroadcastClient',
                    AGORA_PLUGIN_DIR_URI . $agoraUserScript,
                    array('AgoraSDK'), null );

                endif;

                WP_Agora_Public::addShortcodeRendered('[agora-broadcast]');

            else :

                $out = '<!-- Agora: No channel found! -->';

            endif;
        
            return $out;
        }

    }