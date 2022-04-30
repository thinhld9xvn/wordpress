<?php 

    namespace Video;

    class VideoGetMetaYtIdUtils {
        
        public static function get($pid) {

            return get_post_meta($pid, VIDEO_FIELDS::VIDEO_YT_ID_FIELD, true);

        }

    }
