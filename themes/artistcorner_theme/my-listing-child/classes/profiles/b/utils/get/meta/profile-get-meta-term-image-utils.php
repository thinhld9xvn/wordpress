<?php 

    namespace Profiles;

    class ProfileGetMetaTermImageUtils {

        public static function get($term) {

            return get_field(_FIELD_CATEGORY_IMAGE, $term);


        }

    }