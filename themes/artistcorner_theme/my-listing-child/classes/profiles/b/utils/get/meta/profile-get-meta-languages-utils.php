<?php 

    namespace Profiles;

    class ProfileGetMetaLanguagesUtils {

        public static function get($post) {

            $languages = get_post_meta($post->ID, _FIELD_JOBS_LANGUAGES, true);

            return array_map(function($id) {

                return get_term_by('id', $id, JOBS_LANGUAGES_TAXONOMY);

            }, $languages);


        }

    }