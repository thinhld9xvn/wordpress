<?php 

    namespace Notifications;

    class NotificationGetNewPostTokenUtils {

        public static function get() {

            $data = get_option(NEW_POST_TOKEN);

            return ! empty( $data ) ? $data : ''; 

        }

    }