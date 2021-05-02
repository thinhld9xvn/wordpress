<?php 

    namespace Profiles;

    class ProfileGetMetaRatesByHourUtils {

        public static function get($post) {

            //echo var_dump(get_post_meta($post->ID, _FIELD_JOBS_RATES_BY_HOUR, true));

            return get_post_meta($post->ID, _FIELD_JOBS_RATES_BY_HOUR, true);


        }

    }