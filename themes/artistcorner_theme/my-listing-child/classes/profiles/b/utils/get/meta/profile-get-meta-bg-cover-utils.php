<?php 

    namespace Profiles;

    class ProfileGetMetaBgCoverUtils {

        public static function get($post) {

            return get_post_meta($post->ID, '_' . _FIELD_JOBS_BG_COVER, true);

        }

    }