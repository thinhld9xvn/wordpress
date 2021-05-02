<?php 

    namespace Profiles;

    class ProfileGetMetaSalaryUtils {

        public static function get($post) {

            return get_post_meta($post->ID, _FIELD_JOBS_SALARY, true);

        }

    }