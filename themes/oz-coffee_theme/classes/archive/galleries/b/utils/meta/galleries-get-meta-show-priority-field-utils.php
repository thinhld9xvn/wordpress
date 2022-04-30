<?php 

    namespace Archive\Galleries;

    class GalleriesGetMetaShowPriorityFieldUtils {

        public static function get($pid) {

            return get_post_meta($pid, GALLERIES_FIELDS::GALLERIES_SHOW_PRIORITY_FIELD, true);

        }

    }