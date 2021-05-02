<?php 

    namespace Profiles;

    class ProfileMetaGetDemoTapeUtils {

        public static function get($post) {

            return get_post_meta($post->ID, '_' . _FIELD_JOBS_DEMO_TAPE, true);        


        }

    }