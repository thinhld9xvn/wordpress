<?php 

    namespace Profiles; 

    class ProfileGetMetaTermColorUtils {

        public static function get($term) {

            //echo var_dump( get_field(_FIELD_CATEGORY_COLOR, $term) );

            return get_field(_FIELD_CATEGORY_COLOR, $term);

        }

    }