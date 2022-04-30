<?php 
    namespace Home\Clients;
    class ClientsGetBackgroundUtils {
        public static function get($pid) {
            return get_the_post_thumbnail_url($pid, 'post-thumbnail');
        }
    }