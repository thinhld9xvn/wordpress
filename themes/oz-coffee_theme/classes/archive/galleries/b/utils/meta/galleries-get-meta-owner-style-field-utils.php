<?php 

    namespace Archive\Galleries;

    class GalleriesGetMetaOwnerStyleFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, GALLERIES_FIELDS::GALLERIES_OWNER_STYLE_FIELD, true);

        }

    }