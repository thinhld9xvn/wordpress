<?php 

    namespace Profiles;

    class ProfileGetMetaAccountTypesUtils {

        public static function get($post) {

            $account_types = get_post_meta($post->ID, _FIELD_JOBS_ACCOUNT_TYPE, true);

            return array_map(function($id) {

                return get_term_by('id', $id, JOBS_ACCOUNT_TYPE_TAXONOMY);

            }, $account_types);


        }

    }