<?php 

    namespace Profiles;

    class ProfileGetMetaPortfolioUtils {

        public static function get($post) {

            return get_post_meta($post->ID, '_' . _FIELD_JOBS_PORTFOLIO, true);  


        }

    }