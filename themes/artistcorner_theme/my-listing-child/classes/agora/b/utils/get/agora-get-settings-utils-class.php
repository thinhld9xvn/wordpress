<?php 

    namespace Agora;

    class AgoraGetSettingsUtils {

        public static function get() {

            $options = get_option('section-agora_option_name');

            return array(
                'channel_id' => (int) $options['agora-global-def-channel-id-id'],
                'page_id' => (int) $options['agora-global-page-id-id'],
                'video_profile' => $options['agora-global-video-profile-id'],
                'screen_profile' => $options['agora-global-screen-profile-id']
            );

        }
        
    }