<?php 

    namespace Profiles;

    class ProfileGetMetaCategoryOfServiceUtils {

        public static function get($post) {

            $ids = get_post_meta($post->ID, _FIELD_JOBS_CATEGORY_OF_SERVICE, true);

            return array_map(function($id) {

                return get_term_by('id', $id, JOBS_CATEGORY_OF_SERVICE_TAXONOMY);

            }, $ids);           


        }

    }