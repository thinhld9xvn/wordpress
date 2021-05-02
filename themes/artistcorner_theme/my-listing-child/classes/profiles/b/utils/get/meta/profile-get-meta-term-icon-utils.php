<?php 

    namespace Profiles;

    class ProfileGetMetaTermIconUtils {

        public static function get($term) {

            return get_field(_FIELD_CATEGORY_ICON, $term);

        }

    }