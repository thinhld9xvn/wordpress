<?php 

    namespace Profiles;

    class ProfileGetMetaTermTextColorUtils {

        public static function get($term) {

            return get_field(_FIELD_CATEGORY_TEXT_COLOR, $term);

        }

    }