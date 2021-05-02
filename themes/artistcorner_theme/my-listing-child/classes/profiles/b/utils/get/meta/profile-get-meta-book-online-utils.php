<?php 

    namespace Profiles;

    class ProfileGetMetaBookOnlineUtils {

        public static function get($post) {

            return get_post_meta($post->ID, '_' . _FIELD_JOBS_BOOK_ONLINE, true);


        }

    }