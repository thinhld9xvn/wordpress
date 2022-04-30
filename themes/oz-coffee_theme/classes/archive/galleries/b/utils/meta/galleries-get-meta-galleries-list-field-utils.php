<?php 

    namespace Archive\Galleries;

    class GalleriesGetMetaGalleriesListFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, GALLERIES_FIELDS::GALLERIES_LISTS_STYLE_FIELD, true);

        }

    }