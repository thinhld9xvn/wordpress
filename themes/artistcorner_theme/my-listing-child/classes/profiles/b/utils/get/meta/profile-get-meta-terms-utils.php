<?php 

    namespace Profiles;

    class ProfileGetMetaTermsUtils {

        public static function get($post) {

            return get_the_terms($post, JOBS_TAXONOMY);

        }

    }